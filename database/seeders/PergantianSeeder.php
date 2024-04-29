<?php

namespace Database\Seeders;

use App\Models\Pergantian;
use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PergantianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pergantian::factory(Site::count())->create();
    }
}
