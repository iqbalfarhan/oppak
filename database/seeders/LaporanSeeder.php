<?php

namespace Database\Seeders;

use App\Models\Laporan;
use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Laporan::factory(Site::count() * 10)->create();
    }
}
