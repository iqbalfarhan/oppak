<?php

namespace Database\Seeders;

use App\Models\Laporan;
use App\Models\Rectifier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RectifierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rectifier::factory(Laporan::count())->create();
    }
}
