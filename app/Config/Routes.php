<?php

use App\Controllers\Home;
use App\Controllers\User;
use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', [Home::class, 'index'], ['as' => 'home.index']);
$routes->get('/users', 'User::index', ['as' => 'users.index']);
$routes->get('/user/(:any)/id/(:num)', [User::class, 'show'], ['as' => 'user.show']);
