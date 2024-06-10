<?php

namespace Database\Seeders;

use App\Models\PriceManagement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        PriceManagement::truncate();
        $data = [
            [
                'type' => 'default',
                'mode' => 'jeep',
                'indian' => 1000000,
                'foreigner' => 1200000,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'default',
                'mode' => 'elephant',
                'indian' => 1500000,
                'foreigner' => 1800000,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'weekend',
                'mode' => 'jeep',
                'indian' => 1200000,
                'foreigner' => 1500000,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'weekend',
                'mode' => 'elephant',
                'indian' => 1800000,
                'foreigner' => 2000000,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'date-range',
                'mode' => 'jeep',
                'start' => '2022-09-01',
                'end' => '2022-09-05',
                'indian' => 1200000,
                'foreigner' => 1500000,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'date-range',
                'mode' => 'elephant',
                'start' => '2022-11-01',
                'end' => '2022-11-05',
                'indian' => 1800000,
                'foreigner' => 2000000,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($data as $key => $value) {
            PriceManagement::create($value);

        }
    }
}
