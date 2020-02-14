<?php

use Illuminate\Database\Seeder;
use App\Models\Tickets\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = new Category();
        $category1->name = 'Bug';
        $category1->description = 'Description for Bug Category';
        $category1->id_user = '1';
        $category1->save();

        $category2 = new Category();
        $category2->name = 'Feature Request';
        $category2->description = 'Description for Feature Request Category';
        $category2->id_user = '1';
        $category2->save();

        $category3 = new Category();
        $category3->name = 'Sales Question';
        $category3->description = 'Description for Sales Question Category';
        $category3->id_user = '1';
        $category3->save();

        $category4 = new Category();
        $category4->name = 'How To';
        $category4->description = 'Description for How To Category';
        $category4->id_user = '1';
        $category4->save();

        $category5 = new Category();
        $category5->name = 'Technical Issue';
        $category5->description = 'Description for Technical Issue Category';
        $category5->id_user = '1';
        $category5->save();

        $category6 = new Category();
        $category6->name = 'Human Resources';
        $category6->description = 'Description for Human Resources Category';
        $category6->id_user = '1';
        $category6->save();

        $category7 = new Category();
        $category7->name = 'Server';
        $category7->description = 'Description for Server Category';
        $category7->id_user = '1';
        $category7->save();
    }
}
