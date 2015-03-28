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

function make_curl($url, $post= array())
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($post));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $result = curl_exec($ch);
    $info = curl_getinfo($ch);
    var_dump($info);
    curl_close($ch);
    return $result;
}

