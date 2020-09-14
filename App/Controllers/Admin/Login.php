<?php

namespace App\Controllers\Admin;

use \Core\View;
use \Core\Helpers;
use \App\Users;

class Login extends \Core\Controller
{

    public function login()
    {
        if (isset($_POST['asdgonder']))
        {
            echo 'asdasdasdasd';
            exit;
        }
        return View::renderTemplate('Admin/Auth/Login', [
            'url' => Helpers::url()
        ]);
    }

    public function auth()
    {
        if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password'])))
        {
            $db = Users::getAll();
        }
    }

}