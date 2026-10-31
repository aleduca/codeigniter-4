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
			'posts' => $model->getPostsWithAuthor(10),
			'pager' => $model->pager,
		];

		return view('posts/index', $data);
	}

	public function destroy(int $id)
	{
		$model = model(PostModel::class);

		if ($model->delete($id)) {
			return redirect()->route('posts.index')->with('success', 'Post deletado com sucesso');
		}

		return redirect()->route('posts.index')->with('error', 'Ocorreu um erro ao deletar o post');
	}
}
