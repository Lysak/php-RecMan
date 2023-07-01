<?php

use components\Db;
use components\Response;
use components\Router;

if (1) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}

try {
    chdir(dirname(__DIR__));
    require 'vendor/autoload.php';

    define('PROJECT_ROOT', dirname(__DIR__));
    define('APPLICATION_ROOT', dirname(__DIR__) . '/src');

    global $db;
    $db = Db::getConnection();

    $router = new Router();
    $router->run();
} catch (Throwable $e) {
    Response::renderError($e->getMessage());
}
