<?php

namespace Core;

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
}