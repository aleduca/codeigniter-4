<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index(): string
	{
		dd($this->response);

		return view('welcome_message');
	}
}
