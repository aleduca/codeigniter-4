<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index(): string
	{
		return view('home', ['title' => 'Home Page']);
	}
}
