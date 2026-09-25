<?php

namespace App\Controllers;

use App\Models\User as UserModel;

class User extends BaseController
{
	public function index()
	{
		$users = model(UserModel::class)->findAll();

		return view('users/index', ['users' => $users]);
	}

	public function create()
	{
		return view('users/create');
	}

	public function store()
	{
		$user = model(UserModel::class);
		$data = $this->request->getPost();
		$session = session();
		$inserted = $user->insert($data);
		if ($inserted) {
			$session->setFlashdata('success', 'Usuário cadastrado com sucesso');

			return redirect()->back();
		}

		$session->setFlashdata('error', 'Ocorreu um erro ao cadastrar o usuário');

		return redirect()->back()->withInput();
	}
}
