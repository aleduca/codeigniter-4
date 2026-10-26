<?php

use App\Controllers\Auth;
use App\Controllers\Errors;
use App\Controllers\Home;
use App\Controllers\Post;
use App\Controllers\PostHtmx;
use App\Controllers\User;
use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', [Home::class, 'index'], ['as' => 'home.index']);

$routes->group('posts', static function ($routes) {
	$routes->get('/', [Post::class, 'index'], ['as' => 'posts.index']);
	$routes->delete('(:num)', [Post::class, 'destroy'], ['as' => 'posts.delete']);
	$routes->get('(:num)/quick-edit', [PostHtmx::class, 'quickEdit'], ['as' => 'posts.quick-edit']);
	$routes->get('(:num)/row', [PostHtmx::class, 'postRow'], ['as' => 'posts.row']);
	$routes->patch('(:num)/quick-edit', [PostHtmx::class, 'quickUpdate'], ['as' => 'posts.quick-update']);
});

$routes->get('/users', [User::class, 'index'], ['as' => 'users.index']);

$routes->group('user', ['filter' => ['auth']], function ($routes) {
	$routes->post('/', [User::class, 'store'], ['as' => 'users.store']);
	$routes->get('create', [User::class, 'create'], ['as' => 'users.create']);
	$routes->get('edit/(:num)', [User::class, 'edit'], ['as' => 'users.edit']);
	$routes->put('(:num)', [User::class, 'update'], ['as' => 'users.update']);
	$routes->delete('(:num)', [User::class, 'destroy'], ['as' => 'users.delete']);
});

$routes->group('', static function ($routes) {
	$routes->get('/login', [Auth::class, 'index'], ['as' => 'auth.index']);
	$routes->post('/login', [Auth::class, 'store'], ['as' => 'auth.store']);
	$routes->delete('/logout', [Auth::class, 'destroy'], ['as' => 'auth.delete', 'filter' => ['auth']]);
});

$routes->set404Override(Errors::class . '::show404');
