<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BureauSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Dinas Kependudukan & Catatan Sipil',
                'short_name' => 'DUKCAPIL',
                'address' => 'Akshya Nagar 1st Block 1st Cross, Rammurthy nagar, Bangalore-560016',
                'phone' => '858-856-4076',
                'email' => 'dukcapil@kubar.go.id',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dinas Kesehatan',
                'short_name' => 'DINKES',
                'address' => 'Jl Raya Bekasi Km 20 RT 001/13, Dki Jakarta',
                'phone' => '344-113-353',
                'email' => 'dinkes@kubar.go.id',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dinas Pendidikan & Kebudayaan',
                'short_name' => 'DIKBUD',
                'address' => 'Jl Mutiara, Kel. Sangaji, Km 20 RT 001/13, Kota Ternate',
                'phone' => '36437-4547-2313',
                'email' => 'dikbud@kubar.go.id',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dinas Pekerjaan Umum & Penataan Ruang',
                'short_name' => 'PUPR',
                'address' => 'Jl Siko, Kel. Maliaro, Km 20 RT 001/13, Kota Tidore',
                'phone' => '36437-4547-2313',
                'email' => 'pupr@kubar.go.id',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dinas Sosial',
                'short_name' => 'DINSOS',
                'address' => 'Jl Korem, Kel. Mangga Dua, Km 20 RT 001/44, Kota Gorontalo',
                'phone' => '36437-4547-2313',
                'email' => 'dinsos@kubar.go.id',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        DB::table('bureaus')->insert($data);
    }
}
