<?php

namespace App\Entities;

use App\Models\User;
use CodeIgniter\Entity\Entity;

class PostEntity extends Entity
{
	protected $datamap = [];
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	protected $casts = [];

	public function getAuthor(): string
	{
		if (!empty($this->attributes['firstName'])) {
			return trim($this->attributes['firstName'] . ' ' . ($this->attributes['lastName'] ?? ''));
		}

		if (!empty($this->attributes['user_id'])) {
			$user = model(User::class)->find($this->attributes['user_id']);
			if ($user) {
				return $user->fullName;
			}
		}

		return 'Desconhecido';
	}

	public function getExcerpt(int $limit = 120): string
	{
		$content = strip_tags($this->attributes['content'] ?? '');

		return mb_strlen($content) > $limit ? mb_substr($content, 0, $limit) . '...' : $content;
	}
}
