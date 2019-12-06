<?php

// Auth Route Handling
$router->use('GET', '/auth/register', new App\Controllers\AuthController(), 'register_view');
$router->use('POST', '/auth/register', new App\Controllers\AuthController(), 'register');

// Index Route Handling
$router->use('GET', '/index', new App\Controllers\ViewsController(), 'index');
//$router->use('POST', '/index', new App\Controllers\ViewsController(), 'login');

// Login-Logout Route Handling
$router->use('GET', '/auth/login', new App\Controllers\AuthController(), 'login_view');
$router->use('POST', '/auth/login', new App\Controllers\AuthController(), 'login');
$router->use('GET', '/logout', new App\Controllers\AuthController(), 'logout');

// Admin Dashbord Handling
$router->use('GET', '/admin_dashboard', new App\Controllers\AdminController(), 'admin_view');
$router->use('GET', '/delete_account', new App\Controllers\AdminController(), 'delete_account');