<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manageUser = new Permission();
        $manageUser->name = 'Manage users';
        $manageUser->slug = 'manage-users';
        $manageUser->save();

        $createTickets = new Permission();
        $createTickets->name = 'Create Tickets';
        $createTickets->slug = 'create-tickets';
        $createTickets->save();
    }
}
