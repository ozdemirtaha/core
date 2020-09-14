<?php

namespace App;

use http\Url;

/**
 * Application configuration
 *
 * PHP version 7.0
 */
class Config
{

    /**
     * WEBSITE URL
     * Enter without "http://" or "https://"
     * End With '/'
     * @var url
     */
    const WEBSITE_URL = 'localhost/tahtsoft/core/';

    /**
     * WEBSITE URL
     * Enter without "http://" or "https://"
     * @var url
     */
    const SSL = false;

    /**
     * WEBSITE URL
     * Enter without "http://" or "https://"
     * @var url
     */
    const WWW = false;

    /**
     * Database host
     * @var string
     */
    const DB_HOST = 'your-database-host';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'your-database-name';

    /**
     * Database user
     * @var string
     */
    const DB_USER = 'your-database-user';

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = 'your-database-password';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = true;
}
