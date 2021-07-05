<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Citizen;

class CitizenSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // insert citizens
        for ($i = 1; $i <= 100; $i++) {
            Citizen::create([
                'id' => $faker->nik(),
                'kk_number' => $faker->nik(),
                'full_name' => $faker->name(),
                'birth_place' => $faker->state,
                'birth_date' => $faker->date(),
                'sex' => $faker->randomElement(['m', 'f']),
                'citizenship' => $faker->randomElement(['wni', 'wna']),
            ]);
        }
    }
}
