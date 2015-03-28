<html>
	<head></head>
	<body>
  <?php
		// Crida a les configs de social
  //COMMIT test
    $oauthConf = dirname(__FILE__) . '/vendor/hybridauth/config.php';

		require_once(dirname(__FILE__) . '/vendor/autoload.php');
		

   try{

       $hybridauth = new Hybrid_Auth( $oauthConf );
 
       $facebook = $hybridauth->authenticate( "Facebook" );
 
       $user_profile = $facebook->getUserProfile();
 
       echo "Hi there! " . $user_profile->displayName;
 
       $facebook->setUserStatus( "Hello world!" );
 
       $user_contacts = $facebook->getUserContacts(); 
   }
   catch( Exception $e ){
       echo "Ooophs, we got an error: " . $e->getMessage();
   }
   ?>
	</body>
</html>