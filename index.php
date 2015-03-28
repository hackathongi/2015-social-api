<?php
// Configuration
require_once dirname(__FILE__) . '/includes/config.php';
// Autoload
require_once dirname(__FILE__) . '/vendor/autoload.php';
define('FACEBOOK_SDK_V4_SRC_DIR', dirname(__FILE__) . '/vendor/facebook-php-sdk-v4-4.0-dev/src/Facebook/');
require_once dirname(__FILE__) . '/vendor/facebook-php-sdk-v4-4.0-dev/autoload.php';
// Carrega del config del hibrid
$oauthConf = include dirname(__FILE__) . '/vendor/hybridauth/config.php';



// Ini de Slim
$app = new \Slim\Slim();

// Includes de la plataforma
require_once(dirname(__FILE__) . '/includes/functions.php');
require_once(dirname(__FILE__) . '/includes/db.php');
require_once(dirname(__FILE__) . '/includes/routes.php');

$db = new DB();


// Run
$app->run();
?>
