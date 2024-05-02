<?php

namespace Database\Seeders;

use App\Models\Amf;
use App\Models\Laporan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Amf::factory(Laporan::count())->create();
    }
}
