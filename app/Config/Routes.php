<?php

use App\Controllers\Errors;
use App\Controllers\Home;
use App\Controllers\User;
use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', [Home::class, 'index'], ['as' => 'home.index']);
$routes->get('/users', [User::class, 'index'], ['as' => 'users.index']);
$routes->get('/user/create', [User::class, 'create'], ['as' => 'users.create']);
$routes->post('/user', [User::class, 'store'], ['as' => 'users.store']);

$routes->set404Override(Errors::class . '::show404');
