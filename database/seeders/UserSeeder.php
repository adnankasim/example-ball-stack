<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Citizen;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // insert user
        foreach (Citizen::all() as $citizen) {
            User::create([
                'name' => $faker->name(),
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => Hash::make('secret'),
                'phone' => $faker->phoneNumber,
                'is_backend_user' => $faker->randomElement([true, false]),
                'is_active' => $faker->randomElement([true, false]),
                'validated_at' => $faker->randomElement([now(), null]),
                'citizen_id' => $citizen->id,
            ]);
        }
    }
}
