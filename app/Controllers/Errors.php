<?php

namespace App\Controllers;

class Errors extends BaseController
{
	public function show404()
	{
		return view('errors/404');
	}
}
