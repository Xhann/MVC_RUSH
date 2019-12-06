<?php

// Auth Route Handling
$router->use('GET', '/auth/register', new App\Controllers\AuthController(), 'register_view');
$router->use('POST', '/auth/register', new App\Controllers\AuthController(), 'register');


// Login-Logout Route Handling
$router->use('GET', '/auth/login', new App\Controllers\AuthController(), 'login_view');
$router->use('POST', '/auth/login', new App\Controllers\AuthController(), 'login');

$router->use('GET', '/logout', new App\Controllers\AuthController(), 'logout');

// Index Route Handling
//$router->use('GET', '', new App\Controllers\ViewsController(), 'index');
//$router->use('GET', '/index', new App\Controllers\ViewsController(), 'index');
$router->use('GET', '/index', new App\Controllers\ViewsController(), 'index');
$router->use('POST', '/index', new App\Controllers\ViewsController(), 'login');

// Admin Dashbord Handling
$router->use('GET', '/admin_dashboard', new App\Controllers\AdminController(), 'admin_view');
$router->use('GET', '/delete_account', new App\Controllers\AdminController(), 'delete_account');

// Articles Handling
$router->use('GET', '/articles', new App\Controllers\ArticlesController(), 'articles_view');
$router->use('GET', '/article', new App\Controllers\ArticlesController(), 'article_by_id');
$router->use('GET', '/edit_article', new App\Controllers\ArticlesController(), 'edit_article');