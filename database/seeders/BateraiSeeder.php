<?php

namespace Database\Seeders;

use App\Models\Baterai;
use App\Models\Laporan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BateraiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Baterai::factory(Laporan::count())->create();
    }
}
