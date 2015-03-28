<?php
// Configuration
require_once dirname(__FILE__) . '/config.php';

// Autoload
require_once dirname(__FILE__) . '/vendor/autoload.php';

// Ini de Slim
$app = new \Slim\Slim();

// Includes de la plataforma
require_once(dirname(__FILE__) . '/includes/routes.php');
