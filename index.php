<?php
// Configuration
require_once dirname(__FILE__) . '/includes/config.php';
// Autoload
require_once dirname(__FILE__) . '/vendor/autoload.php';
// Carrega del config del hibrid
$oauthConf = include dirname(__FILE__) . '/vendor/hybridauth/config.php';


// Ini de Slim
$app = new \Slim\Slim();

// Includes de la plataforma
require_once(dirname(__FILE__) . '/includes/functions.php');
require_once(dirname(__FILE__) . '/includes/db.php');
require_once(dirname(__FILE__) . '/includes/routes.php');

// Run
$app->run();
?>
