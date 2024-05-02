<?php

namespace Database\Seeders;

use App\Models\Laporan;
use App\Models\Temperatur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemperaturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Temperatur::factory(Laporan::count())->create();
    }
}
