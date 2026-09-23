<?php

namespace App\Controllers;

use App\Models\User as UserModel;

class User extends BaseController
{
	public function index()
	{
		$users = model(UserModel::class)->findAll();

		return view('users', ['users' => $users]);
	}
}
