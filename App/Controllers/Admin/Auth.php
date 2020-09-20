<?php

namespace App\Controllers\Admin;

use \Core\View;
use \Core\Helpers;

class Auth extends \Core\Controller
{

    public function login()
    {
        return View::render('Admin/Auth/Login');
    }

}