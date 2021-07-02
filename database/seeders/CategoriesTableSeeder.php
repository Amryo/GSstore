<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ORM :: Eleqount Model
        //Query Builder 
        /*  DB::table('categories')->insert([
            'name' => 'My First Category',
            'slug' => 'My-first-category',
            'status' => 'Active'

        ]);
        DB::connection('mysql')->table('categories')->insert([
            'name' => 'Sub Category',
            'slug' => 'sub-category',
            'parent_id' => 1 ,
            'status' => 'Active'

        ]);*/
        //SQL commands 
    }
}
