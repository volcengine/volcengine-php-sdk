<?php
// autoload.php - 自动加载所有核心模块

require_once __DIR__ . '/ApiClient.php';
require_once __DIR__ . '/Configuration.php';

// 加载子模块
require_once __DIR__ . '/Auth/autoload.php';
require_once __DIR__ . '/Interceptor/autoload.php';

?>
