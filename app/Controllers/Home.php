<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index(): string
	{
		$names = [
			'Ana',
			'João',
			'Maria',
			'Pedro',
			'Beatriz',
			'Carlos',
			'Inês',
			'Rafael',
			'Júlia',
			'Luís',
		];

		return view('home', ['names' => $names]);
	}
}
