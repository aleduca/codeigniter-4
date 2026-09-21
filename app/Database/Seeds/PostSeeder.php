<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostSeeder extends Seeder
{
	public function run()
	{
		$faker = \Faker\Factory::create();
		$data = [];

		for ($i = 0; $i < 10; $i++) {
			$data[] = [
				'title' => $faker->sentence(),
				'slug' => $faker->slug(),
				'user_id' => rand(1, 10),
				'content' => $faker->paragraph(),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
			];
		}

		$this->db->table('posts')->insertBatch($data);
	}
}
