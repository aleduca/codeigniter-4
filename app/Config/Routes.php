<?php

use App\Controllers\Errors;
use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', [Home::class, 'index'], ['as' => 'home.index']);
$routes->get('/users', 'User::index', ['as' => 'users.index']);

$routes->set404Override(Errors::class . '::show404');
