<?php
// Auth/Providers/autoload.php

require_once __DIR__ . '/Provider.php';
require_once __DIR__ . '/StaticCredentialProvider.php';
require_once __DIR__ . '/StsProvider.php';
require_once __DIR__ . '/EnvironmentVariableCredentialProvider.php';
require_once __DIR__ . '/StsFormRequest.php';
require_once __DIR__ . '/StsCredentialTrait.php';
require_once __DIR__ . '/OidcCredentialProvider.php';
require_once __DIR__ . '/SamlCredentialProvider.php';
require_once __DIR__ . '/InvalidGrantApiException.php';
require_once __DIR__ . '/SsoCredentialProvider.php';
require_once __DIR__ . '/ConsoleLoginCredentialProvider.php';
require_once __DIR__ . '/CLIConfigCredentialProvider.php';
require_once __DIR__ . '/EcsRoleCredentialProvider.php';
require_once __DIR__ . '/DefaultCredentialProvider.php';

?>
