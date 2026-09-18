<?php

namespace App\Controllers;

class User extends BaseController
{
	public function index()
	{
		return view('users');
	}

	public function show(string $user, int $id)
	{
		dd($user, $id);
	}
}
