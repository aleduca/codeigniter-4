<?php

namespace App\Controllers;

use App\Models\Post as PostModel;

class PostHtmx extends BaseController
{
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
		$post  = $model->findWithAuthor($id);

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

		$post = $model->findWithAuthor($id);

		return view('posts/partials/post_row', ['post' => $post]);
	}
}
