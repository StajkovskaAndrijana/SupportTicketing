<?php

use App\Models\Tickets\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status1 = new Status();
        $status1->name = 'Open';
        $status1->description = 'Description for Open Status';
        $status1->id_user = '1';
        $status1->save();

        $status2 = new Status();
        $status2->name = 'Closed';
        $status2->description = 'Description for Closed Status';
        $status2->id_user = '1';
        $status2->save();
    }
}
