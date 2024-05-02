<?php

namespace Database\Seeders;

use App\Models\Bbm;
use App\Models\Laporan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BbmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bbm::factory(Laporan::count())->create();
    }
}
