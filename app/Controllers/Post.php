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

	public function destroy(int $id)
	{
		$model = model(PostModel::class);

		if ($model->delete($id)) {
			return redirect()->back()->with('success', 'Post deletado com sucesso');
		}

		return redirect()->back()->with('error', 'Ocorreu um erro ao deletar o post');
	}
}
