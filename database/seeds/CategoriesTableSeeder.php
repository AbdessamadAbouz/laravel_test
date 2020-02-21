<?php

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
        DB::table("categories")->insert(
            [
                [
                    'name' => 'Web',
                    'slug' => 'categories',
                ],
                [
                    'name' => 'Mobile',
                    'slug' => 'categories',
                ],[
                    'name' => 'Desktop',
                    'slug' => 'categories',

                ],[
                    'name' => 'Data Science',
                    'slug' => 'categories',

                ],[
                    'name' => 'Data Mining',
                    'slug' => 'categories',

                ],[
                    'name' => 'Analysis',
                    'slug' => 'categories',

                ]
            ]
        );
    }
}
