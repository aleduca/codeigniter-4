<?php

use App\Controllers\Auth;
use App\Controllers\Errors;
use App\Controllers\Home;
use App\Controllers\User;
use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', [Home::class, 'index'], ['as' => 'home.index']);
$routes->get('/users', [User::class, 'index'], ['as' => 'users.index']);
$routes->get('/user/create', [User::class, 'create'], ['as' => 'users.create']);
$routes->post('/user', [User::class, 'store'], ['as' => 'users.store']);
$routes->get('/user/edit/(:num)', [User::class, 'edit'], ['as' => 'users.edit']);
$routes->put('/user/(:num)', [User::class, 'update'], ['as' => 'users.update']);
$routes->delete('/user/(:num)', [User::class, 'destroy'], ['as' => 'users.delete']);
$routes->get('/login', [Auth::class, 'index'], ['as' => 'auth.index']);
$routes->post('/login', [Auth::class, 'store'], ['as' => 'auth.store']);
$routes->delete('/login', [Auth::class, 'destroy'], ['as' => 'auth.delete']);

$routes->set404Override(Errors::class . '::show404');
