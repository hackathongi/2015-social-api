<?php
  global $oauthConf;

	/**
	 * Tornar la info de l'usuari
	 */
	$app->get('/', function () {
		echo 'API SOCIAL';
	});

	/**
	 * Login a facebook
	 */
	$app->get('/login/:provider', function ($provider) {
	  global $oauthConf;

    $hybridauth = new Hybrid_Auth( $oauthConf );
    $adapter = $hybridauth->authenticate( $provider );
    $user_profile = $adapter->getUserProfile();


    		echo '<pre>';
    		print_r($user_profile);
    		echo '</pre>';
    		exit;
    	

	});
	
	/**
	 * Tornar la info de l'usuari
	 */
	$app->get('/info/:provider/:userId', function ($provider, $userId) {});

	/**
	 * Tornar els amics de l'usuari
	 */
	$app->get('/friends/:provider/:userId/:userIdRel', function ($provider, $userId, $userIdRel) {});

	/**
	 * Inserta la info a l'stream de lusuari
	 */
	$app->post('/publish/:provider/:userId', function ($provider, $userId) {});

	/**
	 * Envia missatges entre usuaris
	 */
	$app->post('/messages/:provider/:userId', function ($provider, $userId) {});