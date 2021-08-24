<?php

use Framework\Router\Router;
use Framework\Session\Session;

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

require 'vendor/autoload.php';
$session = new Session();
$session->start();
$router = new Router();
$router->run();
