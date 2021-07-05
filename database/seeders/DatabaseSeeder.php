<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(CitizenSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BureauSeeder::class);
    }
}
