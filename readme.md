# User Commands

Laravel 5 User / Role Commands

Requires models for App\User and App\Role, preferably used with Zizaco/entrust

# How To Install

 - Add to composer:

 ```
 "kilrizzy/user-commands": "1.*"
 ```

 - Add to your providers:

 ```
'Kilrizzy\UserCommands\UserCommandsServiceProvider',
```

# Commands

Creates 2 artisan commands:

```
php artisan role:create
```
 - Will ask details to create a new role (ie: admin). If the role name exists, will prompt to update the existing

 ```
php artisan user:create
```

 - Will ask details to create a new user. If user email exists, will prompt to update existing
 - Will ask the name of the role to assign to, so you can quickly create an admin user
