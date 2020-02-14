<?php

use App\Models\Tickets\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type1 = new Type();
        $type1->name = 'Issue Type';
        $type1->description = 'Description for Issue Type';
        $type1->id_user = '1';
        $type1->save();

        $type2 = new Type();
        $type2->name = 'Department Type';
        $type2->description = 'Description for Department Type';
        $type2->id_user = '1';
        $type2->save();

        $type3 = new Type();
        $type3->name = 'Customer Type';
        $type3->description = 'Description for Customer Type';
        $type3->id_user = '1';
        $type3->save();
    }
}
