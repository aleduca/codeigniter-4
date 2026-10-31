<?php

use App\Controllers\Auth;
use App\Controllers\Errors;
use App\Controllers\Home;
use App\Controllers\Post;
use App\Controllers\PostHtmx;
use App\Controllers\User;
use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Home
$routes->get('/', [Home::class, 'index'], ['as' => 'home.index']);

// Posts e HTMX
$routes->group('posts', static function ($routes) {
	$routes->get('/', [Post::class, 'index'], ['as' => 'posts.index']);
	$routes->delete('(:num)', [Post::class, 'destroy'], ['as' => 'posts.delete']);

	// Rotas exclusivas HTMX
	$routes->group('', static function ($routes) {
		$routes->get('(:num)/quick-edit', [PostHtmx::class, 'quickEdit'], ['as' => 'posts.quick-edit']);
		$routes->get('(:num)/row', [PostHtmx::class, 'postRow'], ['as' => 'posts.row']);
		$routes->patch('(:num)/quick-edit', [PostHtmx::class, 'quickUpdate'], ['as' => 'posts.quick-update']);
	});
});

// Usuários
$routes->group('users', static function ($routes) {
	$routes->get('/', [User::class, 'index'], ['as' => 'users.index']);

	$routes->group('', ['filter' => ['auth']], static function ($routes) {
		$routes->get('create', [User::class, 'create'], ['as' => 'users.create']);
		$routes->post('/', [User::class, 'store'], ['as' => 'users.store']);
		$routes->get('edit/(:num)', [User::class, 'edit'], ['as' => 'users.edit']);
		$routes->put('(:num)', [User::class, 'update'], ['as' => 'users.update']);
		$routes->delete('(:num)', [User::class, 'destroy'], ['as' => 'users.delete']);
	});
});

// Autenticação
$routes->group('', static function ($routes) {
	$routes->get('login', [Auth::class, 'index'], ['as' => 'auth.index']);
	$routes->post('login', [Auth::class, 'store'], ['as' => 'auth.store']);
	$routes->delete('logout', [Auth::class, 'destroy'], ['as' => 'auth.delete', 'filter' => ['auth']]);
});

$routes->set404Override(Errors::class . '::show404');
