<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function index()
    {
        View::renderTemplate('Home/index');
    }
    /**
     * Show the test page
     *
     * @return void
     */
    public function test()
    {
        $id = $this->route_params['id'];

        if (isset($id))
        {
            echo '$id var' . '<br>' . 'id: ' . $id;
        }
        else
        {
            echo '$id yok ';
        }
    }
}
