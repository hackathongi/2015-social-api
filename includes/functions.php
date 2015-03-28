<?php

function get_allowed_providers()
{
    global $__allowed_providers;
    return $__allowed_providers;
}

function is_allowed_provider($provider)
{
    return in_array($provider, get_allowed_providers());
}

function get_oauth_conf()
{
    global $oauthConf;
    return $oauthConf;
}

