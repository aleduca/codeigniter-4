<?php

namespace App\Validations;

class UserValidation
{
	public const RULES_CREATE = [
		'firstName' => 'required|max_length[30]|min_length[5]',
		'lastName' => 'required|max_length[30]',
		'email' => 'required|valid_email|is_unique[users.email]',
		'password' => 'required|max_length[10]|min_length[3]',
	];

	public const RULES_UPDATE = [
		'id' => 'max_length[19]|is_natural_no_zero',
		'firstName' => 'required|max_length[30]',
		'lastName' => 'required|max_length[30]',
		'email' => 'required|valid_email|is_unique[users.email,id,{id}]',
		'password' => 'permit_empty|max_length[10]|min_length[3]',
	];
}
