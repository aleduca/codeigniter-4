<?php

if (!function_exists('welcome_user')) {
	function welcome_user()
	{
		return session('user') ?? 'Visitante';
	}
}


if (!function_exists('check')) {
	function check()
	{
		return session()->has('user');
	}
}
