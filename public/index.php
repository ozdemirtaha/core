<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('asd-asd', ['controller' => 'Home', 'action' => 'index']);
$router->add('blog/{id:\w+}/', ['controller' => 'Home', 'action' => 'test']);







/* Admin Routes */

$router->add('admin/login', ['controller' => 'Admin/Auth', 'action' => 'login']);























//$router->add('{controller}/{action}');
$router->dispatch($_SERVER['QUERY_STRING']);
