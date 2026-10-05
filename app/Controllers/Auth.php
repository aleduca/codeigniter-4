<?php

namespace App\Controllers;

use App\Models\User;

class Auth extends BaseController
{
	public function index()
	{
		return view('auth/index');
	}

	public function store()
	{
		$data = $this->request->getPost();

		$validated = $this->validateData($data, [
			'email' => 'required|valid_email',
			'password' => 'required',
		]);

		if (!$validated) {
			return redirect()->back()->with('validated', $this->validator->getErrors());
		}

		// check user
		$user = model(User::class)->where('email', $data['email'])->first();

		// check password
		if (!$user || !password_verify($data['password'], $user->password)) {
			return redirect()->back()->with('error', 'User not found');
		}

		// create session
		// session()->set([
		// 	'user' => [
		// 		'name' => $user->fullName,
		// 	],
		// ]);
		session()->set('user', $user->fullName);

		return redirect()->route('home.index');
	}

	public function destroy()
	{
		// logout
		$session = session();
		if ($session->has('user')) {
			$session->remove('user');
		}

		return redirect()->route('home.index');
	}
}
