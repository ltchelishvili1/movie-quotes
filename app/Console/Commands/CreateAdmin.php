<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'create:admin';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new Admin';

	/**
	 * Execute the console command.
	 */
	public function handle(): void
	{
		$email = $this->ask('Enter the email for the new admin:');
		$password = $this->secret('Enter the password for the new admin:');
		$user = User::create([
			'email'    => $email,
			'password' => $password,
		]);
		$this->info('User created successfully!');
	}
}
