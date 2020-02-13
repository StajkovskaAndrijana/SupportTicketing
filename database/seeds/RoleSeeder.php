<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = 'Admin';
        $admin->slug = 'admin';
        $admin->save();

        $normal_user = new Role();
        $normal_user->name = 'Normal User';
        $normal_user->slug = 'normal_user';
        $normal_user->save();
    }
}
