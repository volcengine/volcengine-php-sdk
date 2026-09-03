<?php
/**
 * Verifies that Request::generateInvocationId() never throws when the secure
 * randomness sources are unavailable and always yields a UUID v4 string.
 *
 * random_bytes() (PHP >= 7) and openssl_random_pseudo_bytes() (PHP >= 8) throw
 * instead of returning false when no randomness source can be found. This check
 * shadows both functions inside the Request namespace so the failure paths can be
 * exercised deterministically.
 */

namespace Volcengine\Common\Interceptor\Interceptors {

    function random_bytes($length)
    {
        $GLOBALS['invocation_id_check']['random_bytes_calls']++;
        if ($GLOBALS['invocation_id_check']['random_bytes_throws']) {
            throw new \Exception('simulated: no appropriate source of randomness');
        }
        return \random_bytes($length);
    }

    function openssl_random_pseudo_bytes($length)
    {
        $GLOBALS['invocation_id_check']['openssl_calls']++;
        $mode = $GLOBALS['invocation_id_check']['openssl_mode'];
        if ($mode === 'throw') {
            throw new \Exception('simulated: openssl failure (PHP >= 8 semantics)');
        }
        if ($mode === 'false') {
            return false; // PHP < 8 failure semantics
        }
        return \openssl_random_pseudo_bytes($length);
    }
}

namespace {

    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . '/../src/Common/autoload.php';

    function assert_same($expected, $actual, $label)
    {
        if ($expected !== $actual) {
            fwrite(STDERR, $label . " failed: expected " . var_export($expected, true) . ", got " . var_export($actual, true) . PHP_EOL);
            exit(1);
        }
    }

    function assert_uuid_v4($value, $label)
    {
        if (!is_string($value) || !preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/', $value)) {
            fwrite(STDERR, $label . " failed: not a UUID v4: " . var_export($value, true) . PHP_EOL);
            exit(1);
        }
    }

    function reset_randomness($randomBytesThrows, $opensslMode)
    {
        $GLOBALS['invocation_id_check'] = array(
            'random_bytes_throws' => $randomBytesThrows,
            'openssl_mode' => $opensslMode,
            'random_bytes_calls' => 0,
            'openssl_calls' => 0,
        );
    }

    function generate_invocation_id()
    {
        $method = new \ReflectionMethod('Volcengine\Common\Interceptor\Interceptors\Request', 'generateInvocationId');
        $method->setAccessible(true);
        return $method->invoke(null);
    }

    function calls($key)
    {
        return $GLOBALS['invocation_id_check'][$key];
    }

    // 1. Healthy environment: random_bytes succeeds, openssl never consulted.
    reset_randomness(false, 'real');
    $first = generate_invocation_id();
    $second = generate_invocation_id();
    assert_uuid_v4($first, 'healthy uuid');
    assert_uuid_v4($second, 'healthy uuid (second call)');
    if ($first === $second) {
        fwrite(STDERR, "healthy uniqueness failed: two calls returned the same id" . PHP_EOL);
        exit(1);
    }
    if (function_exists('random_bytes')) {
        assert_same(2, calls('random_bytes_calls'), 'healthy random_bytes calls');
        assert_same(0, calls('openssl_calls'), 'healthy openssl calls');
    }

    // 2. random_bytes throws, openssl works: falls back to openssl, no exception.
    reset_randomness(true, 'real');
    $id = generate_invocation_id();
    assert_uuid_v4($id, 'random_bytes throws -> openssl fallback');
    if (function_exists('random_bytes') && function_exists('openssl_random_pseudo_bytes')) {
        assert_same(1, calls('openssl_calls'), 'openssl consulted after random_bytes failure');
    }

    // 3. random_bytes throws, openssl returns false (PHP < 8 semantics): md5 fallback.
    reset_randomness(true, 'false');
    assert_uuid_v4(generate_invocation_id(), 'random_bytes throws + openssl false -> md5 fallback');

    // 4. random_bytes throws, openssl throws (PHP >= 8 semantics): md5 fallback.
    reset_randomness(true, 'throw');
    assert_uuid_v4(generate_invocation_id(), 'random_bytes throws + openssl throws -> md5 fallback');

    // 5. md5 fallback still produces distinct ids.
    reset_randomness(true, 'throw');
    $a = generate_invocation_id();
    $b = generate_invocation_id();
    if ($a === $b) {
        fwrite(STDERR, "md5 fallback uniqueness failed: two calls returned the same id" . PHP_EOL);
        exit(1);
    }

    echo "Retry invocation id check passed." . PHP_EOL;
}
