<?php

/**
 * Created by PhpStorm.
 * User: Azalsk
 * Date: 27/08/2015
 * Time: 20:11
 */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;

class ProductTableSeeder extends Seeder
{
    public function run(){

        DB::table('products')->truncate();
        factory('CodeCommerce\Product', 40)->create();
    }
}