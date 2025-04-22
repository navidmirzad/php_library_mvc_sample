<?php

session_start();

/**
 * It requires all class files instead of loading them one by one.
 */
spl_autoload_register(function ($class){
    $root = dirname(__DIR__);
    $file = $root . "/" . str_replace("\\", "/", $class) . ".php";
    if (is_readable($file)) {
        require $file;
    }
});

/**
 * Custom error and exception handling
 */
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * Routing
 */
$router = new Core\Router();
$router->add("", [
    "controller" => "Home",
    "action" => "index"
]);

$router->add("books", [
    "controller" => "Books",
    "action" => "index"
]);

$router->add("books/new", [
    'controller' => 'Books',
    'action' => 'new'
]);

$router->add('books/create', [
    'controller' => 'Books',
    'action' => 'create',
    'method' => 'POST'
]);

/* 
 * Route dispatch
 */
$url = $_SERVER['QUERY_STRING'];
$router->dispatch($url);