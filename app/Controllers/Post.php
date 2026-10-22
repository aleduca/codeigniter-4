<?php

namespace App\Controllers;

use App\Models\Post as PostModel;

class Post extends BaseController
{
	public function index()
	{
		$model = model(PostModel::class);

		$data = [
			'title' => 'Lista de Posts',
			'posts' => $model->select('posts.*, users.firstName, users.lastName')
				->join('users', 'users.id = posts.user_id', 'left')
				->orderBy('posts.id', 'desc')
				->paginate(10),
			'pager' => $model->pager,
		];

		return view('posts/index', $data);
	}

	public function quickEdit(int $id)
	{
		$model = model(PostModel::class);
		$post  = $model->find($id);

		if (! $post) {
			return $this->response->setStatusCode(404)->setBody('Post não encontrado.');
		}

		return view('posts/partials/quick_edit_form', ['post' => $post]);
	}

	public function postRow(int $id)
	{
		$model = model(PostModel::class);
		$post  = $model->select('posts.*, users.firstName, users.lastName')
			->join('users', 'users.id = posts.user_id', 'left')
			->find($id);

		if (! $post) {
			return $this->response->setStatusCode(404)->setBody('Post não encontrado.');
		}

		return view('posts/partials/post_row', ['post' => $post]);
	}

	public function quickUpdate(int $id)
	{
		$model = model(PostModel::class);
		$post  = $model->find($id);

		if (! $post) {
			return $this->response->setStatusCode(404)->setBody('Post não encontrado.');
		}

		$data = [
			'title'   => $this->request->getRawInputVar('title'),
			'content' => $this->request->getRawInputVar('content'),
		];

		$model->update($id, $data);

		// Recarrega o post atualizado
		$post = $model->select('posts.*, users.firstName, users.lastName')
			->join('users', 'users.id = posts.user_id', 'left')
			->find($id);

		return view('posts/partials/post_row', ['post' => $post]);
	}

	public function destroy(int $id)
	{
		$model = model(PostModel::class);

		if ($model->delete($id)) {
			return redirect()->back()->with('success', 'Post deletado com sucesso');
		}

		return redirect()->back()->with('error', 'Ocorreu um erro ao deletar o post');
	}
}

