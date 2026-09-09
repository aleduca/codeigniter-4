<?php


$routes->get('/', function () {
	return view('welcome_message');
}, ['as' => 'home.index']);

$routes->post('/users', 'User::index', ['as' => 'users.index']);
