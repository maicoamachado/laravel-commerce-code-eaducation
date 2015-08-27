<?php

/**
 * Created by PhpStorm.
 * User: Azalsk
 * Date: 27/08/2015
 * Time: 20:11
 */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;
//use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
{
    public function run(){

        DB::table('categories')->truncate();
       /*
        Category::create([
            'name' => 'Category 1',
            'description' => 'Descritpion 1'
        ]);

        Category::create([
            'name' => 'Category 2',
            'description' => 'Descritpion 2'
        ]);


        $faker = Faker::create();

        foreach(range(1,15) as $i){
            Category::create([
                'name' => $faker->word(),
                'description' => $faker->sentence()
            ]);
        }
        */

        factory('CodeCommerce\Category', 15)->create();
    }
}