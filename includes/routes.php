<?php
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
	  echo "Hello, $provider";
	  exit;
	  $hybridauth = new Hybrid_Auth( $config );
    $adapter = $hybridauth->authenticate( $provider );  
    $user_profile = $adapter->getUserProfile(); 
	});
	
	/**
	 * Tornar la info de l'usuari
	 */
	$app->get('/info/:provider/:userId', function ($provider, $userId) {});

	/**
	 * Tornar els amics de l'usuari
	 */
	$app->get('/friends/:provider/:userId', function ($provider, $userId) {});

	/**
	 * Inserta la info a l'stream de lusuari
	 */
	$app->post('/publish/:provider/:userId', function ($provider, $userId) {});

	/**
	 * Envia missatges entre usuaris
	 */
	$app->post('/messages/:provider/:userId', function ($provider, $userId) {});