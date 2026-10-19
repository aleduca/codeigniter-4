<?php

namespace App\Controllers;

use App\Models\User as UserModel;
use CodeIgniter\Queue\Handlers\DatabaseHandler;

class User extends BaseController
{
	public function __construct()
	{
		$this->validator = service('validation');
	}

	public function index()
	{
		$model = model(UserModel::class);

		// Query Builder somente quando chamo o método table() - o db é a conexão - IMPORTANTE !!!
		// try {
		// 	$model->db->transException(true)->transBegin();

		// 	$model->delete(1);

		// 	$model->db->table('users')->update([
		// 		'firstName' => 'João',
		// 	], 'id=4');

		// 	$model->db->transComplete();
		// } catch (\Throwable $th) {
		// 	throw $th;
		// }

		if ($model->db->transStatus() === false) {
			log_message('info', 'Ocorreu um erro ao executar uma query na transaction');
		}

		$data = [
			'users' => $model->paginate(5),
			'pager' => $model->pager,
		];

		return view('users/index', $data);
	}

	public function create()
	{
		return view('users/create');
	}

	public function store()
	{
		$user = model(UserModel::class);
		$data = $this->request->getPost();

		$validated = $this->validator->run($data, 'user_create');

		if (!$validated) {
			return redirect()->back()->withInput()->with('validated', $this->validator->getErrors());
		}

		$inserted = $user->insert($this->validator->getValidated());

		if ($inserted) {
			/** @var DatabaseHandler $queue */
			$queue = service('queue');
			$queue->push('emails', 'email', ['user' => $data]);
			redirect()->back()->with('success', 'Usuário cadastrado com sucesso');
		}
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

		$data['id'] = $id;
		$validated = $this->validator->run($data, 'user_update');

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
