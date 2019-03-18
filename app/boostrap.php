<?php

ob_start();

use Symfony\Component\HttpFoundation\Response;
use Phroute\Phroute\Dispatcher;

// Require autoload
require_once __DIR__ . '/../vendor/autoload.php';
// Require database configurations
require_once __DIR__ . '/../config/config.php';
/* Routes file */
require_once __DIR__ . '/../routes/routes.php';

 /* Phroute Part Start */
function processInput($uri)
{
    $uri = implode('/',
        array_slice(
            explode('/', $_SERVER['REQUEST_URI']), 1));

    return $uri;
}

$dispatcher = new Dispatcher($router->getData());

try {

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], processInput($_SERVER['REQUEST_URI']));

} catch (Phroute\Exception\HttpRouteNotFoundException $e) {

    var_dump($e);
    die();

} catch (Phroute\Exception\HttpMethodNotAllowedException $e) {

    var_dump($e);
    die();

}
/* Phroute Part End */
echo $response;