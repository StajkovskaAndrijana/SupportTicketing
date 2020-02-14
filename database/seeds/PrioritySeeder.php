<?php

use Illuminate\Database\Seeder;
use App\Models\Tickets\Priority;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $priority1 = new Priority();
        $priority1->name = 'High';
        $priority1->description = 'Description for High Priority';
        $priority1->id_user = '1';
        $priority1->save();

        $priority2 = new Priority();
        $priority2->name = 'Medium';
        $priority2->description = 'Description for Medium Priority';
        $priority2->id_user = '1';
        $priority2->save();

        $priority3 = new Priority();
        $priority3->name = 'Low';
        $priority3->description = 'Description for Low Priority';
        $priority3->id_user = '1';
        $priority3->save();
    }
}
