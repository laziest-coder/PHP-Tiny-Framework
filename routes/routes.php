<?php

use Phroute\Phroute\RouteCollector;

$router = new RouteCollector(); 

$router->get('/dayside', function(){
    require_once __DIR__. '/../dayside/index.php';
});
$router->controller('login','Controllers\\UserController');
$router->controller('task','Controllers\\TaskController');
$router->controller('/','Controllers\\IndexController');