<?php

namespace App\Controllers\Admin;

use \Core\View;

class Login extends \Core\Controller
{
    public function login()
    {
        return View::renderTemplate('Admin/Auth/Login.php');
    }
}