<?php
namespace SocialConfig;

/*******************************************************************************
 * DB
 *******************************************************************************/

define('DB_HOST',       'localhost');
define('DB_NAME',       'hackajobs');
define('DB_USER',       'root');
define('DB_PASSWORD',   '');

/*******************************************************************************
 * FACEBOOK
 *******************************************************************************/

define('FB_APP_ID', '898845680138958');
define('FB_APP_SECRET', 'fcd7c90480cfcbe5cb5671fc5c9ff281');

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

$oauthConf = array(
    'base_url' => 'http://apisocial.wallyjobs.com/vendor/hybridauth/',

    'providers' => array (
        'Facebook' => array (
            'enabled' => true,
            'keys'    => array(
                'id' => FB_APP_ID,
                'secret' => FB_APP_SECRET
            ),
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