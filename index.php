<?php

	// Crida a les configs de social
    $oauthConf = dirname(__FILE__) . '/vendor/hybridauth/config.php';
	require_once(dirname(__FILE__) . '/vendor/autoload.php');

	// Ini de Slim
	$app = new \Slim\Slim();

	// Includes de la plataforma
	require_once(dirname(__FILE__) . '/includes/routes.php');

