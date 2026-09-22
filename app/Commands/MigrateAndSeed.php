<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class MigrateAndSeed extends BaseCommand
{
	/**
	 * The Command's Group
	 *
	 * @var string
	 */
	protected $group = 'Database';

	/**
	 * The Command's Name
	 *
	 * @var string
	 */
	protected $name = 'db:fresh';

	/**
	 * The Command's Description
	 *
	 * @var string
	 */
	protected $description = 'Migrate Refresh and Seed';

	/**
	 * The Command's Usage
	 *
	 * @var string
	 */
	protected $usage = 'db:fresh <seed_name> [options]';

	/**
	 * The Command's Arguments
	 *
	 * @var array
	 */
	protected $arguments = [
		'seed_name' => 'Name of the seed',
	];

	/**
	 * The Command's Options
	 *
	 * @var array
	 */
	protected $options = [
		'--clean' => 'Clear the cache',
	];

	/**
	 * Actually execute a command.
	 *
	 * @param array $params
	 */
	public function run(array $params)
	{
		$seeder = $params[0] ?? 'DatabaseSeeder';

		if (CLI::getOption('clean')) {
			CLI::write('Limpando o cache', 'red');
			command('cache:clear');
		}

		CLI::write('Iniciando processo de Migration...', 'yellow');

		// Executa o comando de migration padrão do framework
		command('migrate:refresh');

		CLI::write('Migrations finalizadas com sucesso!', 'green');
		CLI::write('Iniciando processo de Seeding...', 'yellow');

		// Executa o comando de seed padrão do framework
		command('db:seed ' . $seeder);

		CLI::write('Seeds finalizados com sucesso!', 'green');
		CLI::write('Banco de dados atualizado e populado!', 'cyan');
	}
}
