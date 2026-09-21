<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTablePostsAddSlug extends Migration
{
	public function up()
	{
		$this->forge->addColumn('posts', [
			'slug' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'after' => 'title',
			],
		]);
	}

	public function down()
	{
		$this->forge->dropColumn('posts', 'slug');
	}
}
