<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // create roles
        Role::insert([
            ['name' => 'super_admin'],
            ['name' => 'admin'],
            ['name' => 'manager'],
            ['name' => 'rh'],
            ['name' => 'dsi'],
            ['name' => 'user'],
        ]);

        $roles = Role::pluck('id')->toArray();
        $users = User::all();

        foreach ($users as $user) {
            $length = rand(2, 4);
            foreach (range(1, $length) as $i) {
                $user->roles()->attach($faker->randomElement($roles));
            }
        }

        // attache role to users
    }
}
