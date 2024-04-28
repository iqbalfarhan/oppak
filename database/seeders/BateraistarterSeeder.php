<?php

namespace Database\Seeders;

use App\Models\Bateraistarter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BateraistarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bateraistarter::factory(30)->create();
    }
}
