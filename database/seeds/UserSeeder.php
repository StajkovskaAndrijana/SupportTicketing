<?php

use App\Role;
use App\User;
use App\Permission;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('slug','admin')->first();
        $normal_user = Role::where('slug', 'normal_user')->first();
        $createTickets = Permission::where('slug','create-tickets')->first();
        $manageUsers = Permission::where('slug','manage-users')->first();

        $user1 = new User();
        $user1->name = 'Andrijana Stajkovska';
        $user1->email = 'stajkovskaa@gmail.com';
        $user1->password = bcrypt('secret');
        $user1->save();
        $user1->roles()->attach($admin);
        $user1->permissions()->attach($manageUsers);


        $user2 = new User();
        $user2->name = 'Filip Uroshevski';
        $user2->email = 'urosevskifmy@gmail.com';
        $user2->password = bcrypt('secret1');
        $user2->save();
        $user2->roles()->attach($normal_user);
        $user2->permissions()->attach($createTickets);
    }
}
