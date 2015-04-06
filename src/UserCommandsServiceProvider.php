<?php

namespace Kilrizzy\UserCommands;

use Illuminate\Support\ServiceProvider;

class UserCommandsServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerUserCreateCommand();
		$this->registerRoleCreateCommand();
	}

	/**
	 * Register the user:create command.
	 */

	private function registerUserCreateCommand()
	{
		$this->app->singleton('command.kilrizzy.createUser', function ($app) {
			return $app['Kilrizzy\UserCommands\Commands\CreateUserCommand'];
		});

		$this->commands('command.kilrizzy.createUser');
	}

	/**
	 * Register the role:create command.
	 */

	private function registerRoleCreateCommand()
	{
		$this->app->singleton('command.kilrizzy.createRole', function ($app) {
			return $app['Kilrizzy\UserCommands\Commands\CreateRoleCommand'];
		});

		$this->commands('command.kilrizzy.createRole');
	}

}
