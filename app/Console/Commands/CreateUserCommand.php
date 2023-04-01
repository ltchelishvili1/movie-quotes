<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'user:create {email : The email address of the user} {password : The password for the user}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new user';

	/**
	 * Execute the console command.
	 */
	public function handle(): void
	{
		$email = $this->argument('email');
		$password = $this->argument('password');
		$user = new User();
		$user->email = $email;
		$user->password = bcrypt($password);
		$user->save();
		$this->info('User created successfully!');
	}
}
