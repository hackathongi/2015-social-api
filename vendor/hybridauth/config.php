<?php
/**
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2015, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/


// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

$ext = 'http://'; 
if(isset($_SERVER['HTTPS'])){
    if ($_SERVER["HTTPS"] == "on")  {
        $ext = 'https://';
    }
}   
return array(
    'base_url' =>  $ext .'apisocial.wallyjobs.com/vendor/hybridauth/',

    'providers' => array (
        'Facebook' => array (
            'enabled' => true,
            'keys'    => array(
                'id' => '898845680138958',
                'secret' => 'fcd7c90480cfcbe5cb5671fc5c9ff281'
            ),
            'scope' => 'user_about_me, user_friends, user_work_history, email, publish_actions',
            'trustForwarded' => false
        ),
    ),

    // If you want to enable logging, set 'debug_mode' to true.
    // You can also set it to
    // - 'error' To log only error messages. Useful in production
    // - 'info' To log info and error messages (ignore debug messages)
    'debug_mode' => false,

    // Path to file writable by the web server. Required if 'debug_mode' is not false
    'debug_file' => '',
);