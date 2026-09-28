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

	public function edit(int $id)
	{
		$user = model(UserModel::class)->find($id);

		return view('users/edit', ['user' => $user]);
	}

	public function update(int $id)
	{
		$model = model(UserModel::class);
		$session = session();

		$data = $this->request->getPost();

		if ($model->update($id, $data)) {
			$session->setFlashdata('success', 'Usuário atualizado com sucesso');

			return redirect()->back();
		}

		$session->setFlashdata('error', 'Ocorreu um erro ao atualizar o usuário');

		return redirect()->back()->withInput();
	}

	public function destroy(int $id)
	{
		$user = model(UserModel::class);
		$session = session();

		if ($user->delete($id)) {
			$session->setFlashdata('success', 'Usuário deletado com sucesso');

			return redirect()->back();
		}

		$session->setFlashdata('error', 'Ocorreu um erro ao deletar o usuário');

		return redirect()->back()->withInput();
	}
}
