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
		return view('users/create', [
			'validated' => session()->getFlashdata('validated') ?? [],
		]);
	}

	public function store()
	{
		$user = model(UserModel::class);
		$data = $this->request->getPost();
		$session = session();

		$validated = $this->validateData($data, [
			'firstName' => 'required|max_length[30]',
			'lastName' => 'required|max_length[30]',
			'email' => 'required|valid_email|is_unique[users.email]',
			'password' => 'required|max_length[10]|min_length[3]',
		]);

		if (!$validated) {
			$session->setFlashdata('validated', $this->validator->getErrors());

			return redirect()->back()->withInput();
		}


		$inserted = $user->insert($this->validator->getValidated());
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

		return view(
			'users/edit',
			[
				'user' => $user,
				'validated' => session()->getFlashdata('validated') ?? [], ]
		);
	}

	public function update(int $id)
	{
		$model = model(UserModel::class);
		$session = session();

		$data = $this->request->getPost();

		$validated = $this->validateData($data, [
			'firstName' => 'required|max_length[30]',
			'lastName' => 'required|max_length[30]',
			'email' => "required|valid_email|is_unique[users.email,id,{$id}]",
			'password' => 'permit_empty|max_length[10]|min_length[3]',
		]);

		if (!$validated) {
			$session->setFlashdata('validated', $this->validator->getErrors());

			return redirect()->back()->withInput();
		}


		if ($model->update($id, $this->validator->getValidated())) {
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
