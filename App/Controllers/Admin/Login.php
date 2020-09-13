<?php

namespace App\Controllers\Admin;

use \Core\View;
use \Core\Helpers;

class Login extends \Core\Controller
{

    public function login()
    {
        if (isset($_POST['asdgonder']))
        {
            echo 'asdasdasdasd';
            exit;
        }
        return View::renderTemplate('Admin/Auth/Login');
    }

    public function auth()
    {
        Helpers::redirect('http://www.tahaozdemir.com/');
    }

}