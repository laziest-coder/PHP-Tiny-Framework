<?php

use Phroute\Phroute\RouteCollector;

$router = new RouteCollector(); 

$router->controller('/controller','Controllers\\IndexController');

$router->get('hello', function(){ 
    return 'Hello, PHRoute!';   
});

$router->get('jasur',function(){
    return "Hello Jasur :D";
});
$router->controller('checkdb','Controllers\\TaskController');