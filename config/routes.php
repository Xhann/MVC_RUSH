<?php

// Auth Route Handling
$router->use('GET', '/auth/register', new App\Controllers\AuthController(), 'register_view');
$router->use('POST', '/auth/register', new App\Controllers\AuthController(), 'register');

// Login-Logout Route Handling
$router->use('GET', '/login', new App\Controllers\AuthController(), 'login_view');
$router->use('POST', '/login', new App\Controllers\AuthController(), 'login');
$router->use('GET', '/logout', new App\Controllers\AuthController(), 'logout');

// Index Route Handling
$router->use('GET', '', new App\Controllers\ViewsController(), 'index');

// Admin Dashbord Handling
$router->use('GET', '/admin_dashboard', new App\Controllers\AdminController(), 'admin_view');

