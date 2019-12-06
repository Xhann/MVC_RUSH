<?php

$router->use('GET', '/auth/register', new App\Controllers\AuthController(), 'register_view');
$router->use('POST', '/auth/register', new App\Controllers\AuthController(), 'register');

$router->use('GET', '/index', new App\Controllers\ViewsController(), 'index');
$router->use('POST', '/index', new App\Controllers\ViewsController(), 'login');

$router->use('GET', '/auth/login', new App\Controllers\AuthController(), 'login_view');
$router->use('POST', '/auth/login', new App\Controllers\AuthController(), 'login');


$router->use('GET', '/logout', new App\Controllers\AuthController(), 'logout');