<?php

use App\Controllers\Auth;
use App\Controllers\Errors;
use App\Controllers\Home;
use App\Controllers\Post;
use App\Controllers\User;
use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', [Home::class, 'index'], ['as' => 'home.index']);
$routes->get('/posts', [Post::class, 'index'], ['as' => 'posts.index']);
$routes->get('/posts/(:num)/quick-edit', [Post::class, 'quickEdit'], ['as' => 'posts.quick-edit']);
$routes->get('/posts/(:num)/row', [Post::class, 'postRow'], ['as' => 'posts.row']);
$routes->patch('/posts/(:num)/quick-edit', [Post::class, 'quickUpdate'], ['as' => 'posts.quick-update']);
$routes->delete('/posts/(:num)', [Post::class, 'destroy'], ['as' => 'posts.delete']);
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
