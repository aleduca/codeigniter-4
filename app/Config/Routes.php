<?php

use App\Controllers\Auth;
use App\Controllers\Errors;
use App\Controllers\Home;
use App\Controllers\User;
use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', [Home::class, 'index'], ['as' => 'home.index']);
$routes->get('/users', [User::class, 'index'], ['as' => 'users.index']);

$routes->group('user', ['filter' => ['auth']], function ($routes) {
	$routes->post('/', [User::class, 'store'], ['as' => 'users.store']);
	$routes->get('create', [User::class, 'create'], ['as' => 'users.create']);
	$routes->get('edit/(:num)', [User::class, 'edit'], ['as' => 'users.edit']);
	$routes->put('(:num)', [User::class, 'update'], ['as' => 'users.update']);
	$routes->delete('(:num)', [User::class, 'destroy'], ['as' => 'users.delete']);
});

$routes->get('/login', [Auth::class, 'index'], ['as' => 'auth.index']);
$routes->post('/login', [Auth::class, 'store'], ['as' => 'auth.store']);
$routes->delete('/logout', [Auth::class, 'destroy'], ['as' => 'auth.delete', 'filter' => ['auth']]);

$routes->set404Override(Errors::class . '::show404');
