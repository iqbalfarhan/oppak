<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            'TELEGRAM_BOT_TOKEN' => null,
            'TELEGRAM_GROUP_ID_LAPORAN_RUTIN' => null,
            'TELEGRAM_GROUP_ID_INSIDENSIAL' => null,
            'TELEGRAM_GROUP_ID_PERGANTIAN_RUTIN' => null,
            'TELEGRAM_GROUP_ID_TICKETING' => null,
            'TELEGRAM_GROUP_ID_BUKU_TAMU' => null,
        ];

        foreach ($datas as $key => $value) {
            Setting::updateOrCreate([
                'key' => $key,
            ], [
                'value' => $value,
            ]);
        }
    }
}
