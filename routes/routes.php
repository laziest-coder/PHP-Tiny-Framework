<?php

use Phroute\Phroute\RouteCollector;

$router = new RouteCollector(); 

$router->controller('/controller','Controllers\\IndexController');

$router->controller('checkdb','Controllers\\TaskController');
$router->controller('login','Controllers\\UserController');
$router->controller('task','Controllers\\TaskController');
$router->controller('/','Controllers\\IndexController');