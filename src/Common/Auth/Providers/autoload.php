<?php
// Auth/Providers/autoload.php

require_once __DIR__ . '/Provider.php';
require_once __DIR__ . '/StsProvider.php';
require_once __DIR__ . '/EnvironmentVariableCredentialProvider.php';
require_once __DIR__ . '/OidcEnvCredentialProvider.php';
require_once __DIR__ . '/CLIConfigCredentialProvider.php';
require_once __DIR__ . '/EcsRoleCredentialProvider.php';
require_once __DIR__ . '/DefaultCredentialProvider.php';

?>
