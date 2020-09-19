<?php

use App\Config;

function asset($path = '')
{
    if (Config::SSL === true)
    {
        $ssl = 'https://';
    }
    else
    {
        $ssl = 'http://';
    }

    if (Config::WWW === true)
    {
        $www = 'www.';
    }
    else
    {
        $www = '';
    }

    return $url = $ssl . $www . Config::WEBSITE_URL . $path;

}
?>