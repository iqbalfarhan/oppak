<?php

namespace Database\Seeders;

use App\Models\Logticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogticketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Logticket::factory(15)->create();
    }
}
