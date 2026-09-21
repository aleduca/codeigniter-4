<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableUsersAddFirstAndLastname extends Migration
{
	public function up()
	{
		$this->forge->addColumn('users', [
			'firstName' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'after' => 'id',
			],
			'lastName' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'after' => 'firstName',
			],
		]);

		$this->forge->dropColumn('users', 'username');
	}

	public function down()
	{
		$this->forge->dropColumn('users', ['firstName', 'lastName']);
	}
}
