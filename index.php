<?php
ob_start();
session_start();


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Phroute\Phroute\Dispatcher;

// // The application bootstrap file
require_once __DIR__ . '/app/bootstrap.php';

// // Create Symfony Request object
// $request = Request::createFromGlobals();

// Create main core class instance
$app = new \Lib\Core();

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