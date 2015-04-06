# User Commands

Laravel 5 User / Role Commands

Requires models for App\User and App\Role, preferably used with Zizaco/entrust

# Commands

Creates 2 artisan commands:

role:create
 - Will ask details to create a new role (ie: admin). If the role name exists, will prompt to update the existing

user:create
 - Will ask details to create a new user. If user email exists, will prompt to update existing
 - Will ask the name of the role to assign to, so you can quickly create an admin user
