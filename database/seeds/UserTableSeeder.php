<?php

/**
 * Created by PhpStorm.
 * User: Azalsk
 * Date: 27/08/2015
 * Time: 20:11
 */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
//use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    public function run(){

        DB::table('users')->truncate();
        /*
        $faker = Faker::create();

        User::create([
            'name' => 'Maico',
            'email' => 'maicoamachado@gmail.com',
            'password' => Hash::make('abc123')
        ]);

        foreach(range(1,10) as $i){
            User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => Hash::make($faker->word())
            ]);
        }
    */
        factory('CodeCommerce\User')->create([
            'name' => 'Maico',
            'email' => 'maicoamachado@gmail.com',
            'password' => Hash::make('abc123')
        ]);
        factory('CodeCommerce\User', 10)->create();
    }
}