<?php

namespace Database\Seeders;

use App\Models\Perangkat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerangkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Perangkat::factory(20)->create();

        $datas = [
            [
                "name" => "Filter Oli",
                "durasi_pln" => 7,
                "durasi_solar_cell" => 5,
            ],
            [
                "name" => "Filter solar",
                "durasi_pln" => 6,
                "durasi_solar_cell" => 11,
            ],
            [
                "name" => "Oli mesin",
                "durasi_pln" => 7,
                "durasi_solar_cell" => 12,
            ],
            [
                "name" => "Water separator",
                "durasi_pln" => 4,
                "durasi_solar_cell" => 11,
            ],
            [
                "name" => "Battery starter",
                "durasi_pln" => 6,
                "durasi_solar_cell" => 6,
            ],
            [
                "name" => "Refill air baterai",
                "durasi_pln" => 7,
                "durasi_solar_cell" => 11,
            ],
            [
                "name" => "Panbel genset",
                "durasi_pln" => 10,
                "durasi_solar_cell" => 12,
            ],
            [
                "name" => "Maintenange AC",
                "durasi_pln" => 12,
                "durasi_solar_cell" => 12,
            ],
            [
                "name" => "Cuci tangki besar",
                "durasi_pln" => 3,
                "durasi_solar_cell" => 4,
            ],
            [
                "name" => "Cuci tangki kecil",
                "durasi_pln" => 4,
                "durasi_solar_cell" => 4,
            ],
        ];

        foreach ($datas as $data) {
            Perangkat::updateOrCreate([
                'name' => $data['name'],
            ], $data);
        }
    }
}
