<?php

namespace Kilrizzy\UserCommands\Commands;

use Illuminate\Console\Command;
use App\Role;

class CreateRoleCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'role:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a role';

	public function fire(){
		$role = new Role();
		$name = $this->ask('Role Key (ie: "admin"):');
		$role->name = $name;
		//Check exists
		$existingRole = Role::where('name',$name)->first();
		if($existingRole){

			if ($this->confirm('Role exists, Do you wish to update? [yes|no]'))
			{
			  $role = $existingRole;
			}else{
				return false;
			}
		}
		//
		$display_name = $this->ask('Role Name ("Optional"):');
		$description = $this->ask('Role Description ("Optional"):');
		//
		$role->display_name = $display_name;
		$role->description  = $description;
		$role->save();
		//
		$this->info('Role "'.$name.'" saved!');
	}

}
