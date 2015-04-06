<?php

namespace Kilrizzy\UserCommands\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Role;
use Hash;

class CreateUserCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'user:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a user';

	public function fire(){
		$user = new User();
		$email = $this->ask('User email:');
		$user->email = $email;
		//Check exists
		$existingUser = User::where('email',$email)->first();
		if($existingUser){

			if ($this->confirm('User exists, Do you wish to update? [yes|no]'))
			{
			  $user = $existingUser;
			}else{
				return false;
			}
		}
		$password = $this->secret('User password:');
		$user->password = Hash::make($password);
		$user->save();
		$this->info('User: "'.$email.'" saved!');
		//Get a list of available roles
		$role_names = array();
		$roles = Role::all();
		foreach($roles as $role){
			$role_names[] = $role->name;
		}
		if(count($role_names) > 0){
			$addRoleName = $this->ask('Add Role ('.implode(', ',$role_names).') or leave empty for no role:');
			//check role name
			$newRole = Role::where('name',$addRoleName)->first();
			if($newRole){
				$user->attachRole($newRole->id);
				$this->info('Role: '.$newRole->name.' added to user: '.$user->email);
			}else{
				$this->error('Invalid role name');
			}
		}else{
			$this->info('(No Roles available)');
		}
		//return 'test';
	}

}
