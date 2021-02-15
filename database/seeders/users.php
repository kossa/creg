<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // > php artisan make:seeder users
        // > php artisan db:seed --class=users
        // theme : meriatheme, font : fira code
        $faker = \Faker\Factory::create();

        $data = [];

        for ($i = 1; $i <= 50 ; $i++) {
            array_push($data, [
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'password' => bcrypt(123456),
                'address' => $faker->address,
            ]);
        }

        \DB::table("users")->insert($data);
    }
}
