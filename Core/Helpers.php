<?php

namespace Core;
use App\Config;

/**
 * Helpers
 *
 * PHP version 7.0
 */
class Helpers
{
    public static function redirect($url)
    {
        header("location: $url");
    }
    public static function url($path = '')
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
}