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

		$validated = $this->validateData($data, [
			'firstName' => 'required|max_length[30]',
			'lastName' => 'required|max_length[30]',
			'email' => 'required|valid_email|is_unique[users.email]',
			'password' => 'required|max_length[10]|min_length[3]',
		]);

		if (!$validated) {
			return redirect()->back()->withInput()->with('validated', $this->validator->getErrors());
		}

		$inserted = $user->insert($this->validator->getValidated());

		return ($inserted) ?
				redirect()->back()->with('success', 'Usuário cadastrado com sucesso') :
				redirect()->back()->withInput()->with('error', 'Ocorreu um erro ao cadastrar o usuário');
	}

	public function edit(int $id)
	{
		$user = model(UserModel::class)->find($id);

		return view(
			'users/edit',
			[
				'user' => $user,
			]
		);
	}

	public function update(int $id)
	{
		$model = model(UserModel::class);

		$data = $this->request->getPost();

		$validated = $this->validateData($data, [
			'firstName' => 'required|max_length[30]',
			'lastName' => 'required|max_length[30]',
			'email' => "required|valid_email|is_unique[users.email,id,{$id}]",
			'password' => 'permit_empty|max_length[10]|min_length[3]',
		]);

		if (!$validated) {
			return redirect()->back()->withInput()->with('validated', $this->validator->getErrors());
		}


		return ($model->update($id, $this->validator->getValidated())) ?
			redirect()->back()->with('success', 'Usuário atualizado com sucesso') :
			redirect()->back()->withInput()->with('error', 'Ocorreu um erro ao atualizar o usuário');
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
