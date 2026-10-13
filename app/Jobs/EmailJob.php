<?php

namespace App\Jobs;

use CodeIgniter\Queue\BaseJob;

class EmailJob extends BaseJob
{
	public function process()
	{
		log_message('info', 'Enviar email');
	}
}
