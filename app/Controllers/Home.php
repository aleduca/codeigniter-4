<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index(): string
	{
		// helper('date');

		// dd(session()->get());

		return view('home', ['title' => 'Home Page']);
	}
}
