<?php

namespace App\Jobs;

use CodeIgniter\Email\Email;
use CodeIgniter\Queue\BaseJob;
use Exception;

class EmailJob extends BaseJob
{
	public function process()
	{
		/** @var Email $email */
		$email = service('email');

		$user = $this->data['user'];
		$email->setMailType('html');
		$email->setFrom('meuemail@email.com.br', 'Alexandre');
		$email->setTo($user['email']);

		$email->setSubject('Cadastro no site clube full-stack');
		$email->setMessage(view('mail/user_create', ['user' => $user]));

		$send = $email->send();

		if (!$send) {
			throw new Exception($email->printDebugger('headers'));
		}

		return $send;
	}
}
