<?php

namespace Config;

use App\Validations\UserValidation;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
	// --------------------------------------------------------------------
	// Setup
	// --------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var list<string>
	 */
	public array $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public array $templates = [
		'list' => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	// --------------------------------------------------------------------
	// Rules
	// --------------------------------------------------------------------
	public array $user_create = UserValidation::RULES_CREATE;
	public array $user_update = UserValidation::RULES_UPDATE;
	// public array $user_create_errors = UserValidation::CREATE_ERRORS;

	// public array $user_create_errors = [
	// 	'firstName' => [
	// 		'required' => 'Esse campo está vazio',
	// 		'min_length' => 'Esse campo aceita no mínimo {param} caracteres',
	// 	],
	// ];

	// public array $user_update = [
	// 	'id' => 'max_length[19]|is_natural_no_zero',
	// 	'firstName' => 'required|max_length[30]',
	// 	'lastName' => 'required|max_length[30]',
	// 	'email' => 'required|valid_email|is_unique[users.email,id,{id}]',
	// 	'password' => 'permit_empty|max_length[10]|min_length[3]',
	// ];
}
