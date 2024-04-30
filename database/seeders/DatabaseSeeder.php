<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            PermissionSeeder::class,
            SiteSeeder::class,
            TamuSeeder::class,
            SettingSeeder::class,
            TicketSeeder::class,
            InsidensialSeeder::class,

            LaporanSeeder::class,
            GensetSeeder::class,
            AmfSeeder::class,
            BateraiSeeder::class,
            RectifierSeeder::class,
            TemperaturSeeder::class,
            BbmSeeder::class,

            PerangkatSeeder::class,
        ]);
    }
}
