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
            'name' => 'Maico Machado',
            'email' => 'maicoamachado@gmail.com',
            'password' => Hash::make('abc123'),
            'address' => 'Rua Ponta Negra, 235 - Centenario',
            'state_abbr' => 'RS',
            'city' => 'Montenegro',
            'post_code' => '95780-000',
            'is_admin' => 1,
        ]);
        factory('CodeCommerce\User', 10)->create();
    }
}