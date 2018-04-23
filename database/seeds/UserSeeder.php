<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_manager = Role::where('name', 'manager')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $admin = new User();
        $admin->email = 'admin@mail.com';
        $admin->name = 'Admin';
        $admin->password = bcrypt('123456');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $visitor = new User();
        $visitor->email = 'manager@mail.com';
        $visitor->name = 'Manager';
        $visitor->password = bcrypt('123456');
        $visitor->save();
        $visitor->roles()->attach($role_manager);
    }
}
