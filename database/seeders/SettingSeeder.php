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
            'TELEGRAM_GROUP_ID_LAPORAN_RUTIN' => fake()->randomNumber(8),
            'TELEGRAM_GROUP_ID_LAPORAN_INSIDENSIAL' => fake()->randomNumber(8),
            'TELEGRAM_GROUP_ID_LAPORAN_PERGANTIAN_RUTIN' => fake()->randomNumber(8),
            'TELEGRAM_GROUP_ID_LAPORAN_TESTING' => fake()->randomNumber(8),
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
