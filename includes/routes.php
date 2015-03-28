<?php
	/**
	 * Tornar la info de l'usuari
	 */

	$app->get('/', function () {
		?>
<html xmlns:fb="https://www.facebook.com/2008/fbml">


<head></head>
<script src="http://connect.facebook.net/en_US/all.js"></script>

<script>
  // assume we are already logged in
  FB.init({appId: '898845680138958', xfbml: true, cookie: true});

  FB.ui({
      method: 'send',
      name: 'People Argue Just to Win',
      link: 'https://www.facebook.com/',
      });
 </script>



<body>

<button onclick="hello( 'facebook' ).login();">windows</button>
<p id="profile_facebook"></p>
</body>
</html>
		<?php
	});

	/**
	 * Login a facebook
	 */
	$app->get('/login/:provider', function ($provider) use ($app) {
	  global $oauthConf;
	  $response = array();

    $hybridauth = new Hybrid_Auth( $oauthConf );
    $adapter = $hybridauth->authenticate( $provider );
    $user_profile = $adapter->getUserProfile();

    if(empty($user_profile)) {
    	$app->response->headers->set('Content-Type', 'application/json');
      $app->response->setStatus(401);
      $response = array(
      	'message' => 'No conected',
      	'code' 		=> 401,
      );
      $app->response->body(json_encode($response ));
    }
    else {
    	$db = new DB();

    	// Busquem si ja existeix l'usuari
    	$existUser = $db->getUserBySocialId($user_profile->identifier);
    	if(!$existUser) {
	    	// Si no existeix
	    	$newUser = array(
	    		'name' => $user_profile->displayName,
	    		'email' => $user_profile->email,
	    		'facebook_id' => $user_profile->identifier,
	    	);
	    	$db->insertUser($newUser);
      }
      $app->response->headers->set('Content-Type', 'application/json');
      $app->response->setStatus(200);

      $response = array(
      	'message' => 'User logued',
      	'code' 		=> 200,
      );
      $app->response->body(json_encode($response ));
    }

	});
	
	/**
	 * Tornar la info de l'usuari
	 */
	$app->get('/info/:provider/:userId', function ($provider, $user_id)  use ($app){
        global $oauthConf;
        if (is_allowed_provider($provider))
        {
            $db = new DB();
            $user = $db->getUser($user_id);
            if ($user)
            {
                $app->response->headers->set('Content-Type', 'application/json');
                $app->response->setStatus(200);
                $app->response->body(json_encode($user));
            }
            else
            {
                $app->response->headers->set('Content-Type', 'application/json');
                $app->response->setStatus(500);
                $response = array(
                  'message' => 'Unknown user',
                  'code' 		=> 500,
                );
                $app->response->body(json_encode($response));
            }
        }
        else {
            $app->response->headers->set('Content-Type', 'application/json');
            $app->response->setStatus(500);
            $response = array(
              'message' => 'Unknown provider',
              'code' 		=> 500,
            );
            $app->response->body(json_encode($response));
        }
    });

	/**
	 * Tornar els amics de l'usuari
	 */
	$app->get('/friends/:provider/:userId/:userIdRel', function ($provider, $userId, $userIdRel) use ($app){});

    /**
     * Inserta la info a l'stream de lusuari
     */
    $app->post('/publish/:provider/:userId', function ($provider, $userId) use ($app) {
        global $oauthConf;

        $linkValue = $app->request->post('link');

        if(!$linkValue){
            $linkValue = "#";
            //TODO: raise error
        }

        $messageValue = $app->request->post('message');

        if(!$messageValue){
            $messageValue = "";
        }

        $hybridauth = new Hybrid_Auth( $oauthConf );
        $facebook = $hybridauth->authenticate( $provider );
        $facebook->api()->api("/me/feed", "post", array(
            "message" => $messageValue,
            "link"    => $linkValue
            #"picture" => "http://www.mywebsite.com/path/to/an/image.jpg",
            #"name"    => "My page name",
            #"caption" => "And caption"
        ));
    });

	/**
	 * Envia missatges entre usuaris
	 */
	$app->post('/messages/:provider/:userId', function ($provider, $userId) use ($app){});