<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->slug = 'admin';
        $role_admin->permissions = "admin";
        $role_admin->save();

        $role_user = new Role();
        $role_user->name = 'Manager';
        $role_user->slug = 'manager';
        $role_user->permissions = "manager";
        $role_user->save();

    }
}
