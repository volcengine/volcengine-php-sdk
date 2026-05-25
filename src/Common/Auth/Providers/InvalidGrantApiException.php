<?php

namespace Volcengine\Common\Auth\Providers;

use Volcengine\Common\ApiException;

/**
 * @internal
 *
 * Sentinel exception raised when an OAuth /token endpoint returns
 * HTTP 400 with {@code error: "invalid_grant"}. Used by the SSO and
 * console-login credential providers to trigger their disk-reload
 * fallback (re-read the cache once in case a concurrent {@code ve login}
 * or another SDK process rotated the refresh_token under us).
 *
 * This class is not part of the public credential provider API and is
 * caught at the provider boundary; users only ever see {@link ApiException}.
 */
class InvalidGrantApiException extends ApiException
{
}
