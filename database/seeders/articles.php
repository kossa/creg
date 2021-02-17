<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;

class articles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $data = [];

        $users = User::pluck('id')->toArray();

        for ($i = 1; $i <= 100 ; $i++) {
            array_push($data, [
                'name' => $faker->sentence(),
                'body' => $faker->realText(3000),
                'image' => $faker->imageUrl(),
                'user_id' => $faker->randomElement($users),
                'published_at' => $faker->dateTime(),
            ]);
        }

        Article::insert($data);
    }
}
