<?php

namespace App\Controllers;

use \Core\View;
use \Core\Helpers;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Test extends \Core\Controller
{

    public function index()
    {
        View::renderLayout('Test', 'Frontend', []);
    }

}
