<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($path === '/health') {
    http_response_code(200);
    echo 'ok';
    return;
}

$stateFile = getenv('STS_RETRY_STATE_FILE');
if (!$stateFile) {
    http_response_code(500);
    echo 'missing state file';
    return;
}

$attempt = 0;
if (file_exists($stateFile)) {
    $attempt = (int) trim(file_get_contents($stateFile));
}
$attempt++;
file_put_contents($stateFile, (string) $attempt);

if ($attempt === 1) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode([
        'ResponseMetadata' => [
            'Error' => [
                'Code' => 'InternalError',
                'Message' => 'retry me',
            ],
        ],
    ]);
    return;
}

http_response_code(200);
header('Content-Type: application/json');
echo json_encode([
    'ResponseMetadata' => [
        'RequestId' => 'mock-request-id',
    ],
    'Result' => [
        'Credentials' => [
            'AccessKeyId' => 'sts-ak',
            'SecretAccessKey' => 'sts-sk',
            'SessionToken' => 'sts-token',
            'ExpiredTime' => '2030-01-01T00:00:00Z',
        ],
    ],
]);
