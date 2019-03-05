<?php
ob_start();
session_start();


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// // The application bootstrap file
require_once __DIR__ . '/app/bootstrap.php';

// // Create Symfony Request object
$request = Request::createFromGlobals();

// // Create main core class instance
$app = new \Lib\Core();

 // Add routes with controllers
$app->map('/', 'HomeController::index');
$app->map('/login', 'LoginController::login');
$app->map('/logout', 'LoginController::logout');
$app->map('/login-handle', 'LoginController::loginHandle');
$app->map('/tasks/add', 'TaskController::add');
$app->map('/tasks/add-handle', 'TaskController::addHandle');
$app->map('/tasks/edit/{id}', 'TaskController::edit');
$app->map('/tasks/edit-handle/{id}', 'TaskController::editHandle');
$app->map('/tasks/{id}', 'TaskController::show');


// Core class has one method called handle that handles incoming requests
// In this method Response class's instance created and returned
// Response class has send method that we use below
$response = $app->handle($request);

// // Send response to the user
$response->send();