<?php

namespace Database\Seeders;

use App\Models\Amf;
use App\Models\Baterai;
use App\Models\Bbm;
use App\Models\Genset;
use App\Models\Laporan;
use App\Models\Rectifier;
use App\Models\Site;
use App\Models\Temperatur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Site::pluck('id') as $id) {
            DB::transaction(function () use ($id) {
                $laporan = Laporan::factory(1)->create(['site_id' => $id])->first();
                $laporan_id = $laporan->id;

                Genset::factory(1)->create(['laporan_id' => $laporan_id]);
                Amf::factory(1)->create(['laporan_id' => $laporan_id]);
                Baterai::factory(1)->create(['laporan_id' => $laporan_id]);
                Rectifier::factory(1)->create(['laporan_id' => $laporan_id]);
                Temperatur::factory(1)->create(['laporan_id' => $laporan_id]);
                Bbm::factory(1)->create(['laporan_id' => $laporan_id]);
            });

        }
    }
}
