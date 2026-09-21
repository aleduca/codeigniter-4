<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UserSeeder extends Seeder
{
	public function run()
	{
		$faker = Factory::create();
		$data = [];

		for ($i = 0; $i < 10; $i++) {
			$data[] = [
				'firstName' => $faker->firstName(),
				'lastName' => $faker->lastName(),
				'email' => $faker->unique()->safeEmail(),
				'password' => password_hash('123', PASSWORD_DEFAULT),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
			];
		}

		$this->db->table('users')->insertBatch($data);
	}
}
