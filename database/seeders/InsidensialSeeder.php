<?php

namespace Database\Seeders;

use App\Models\Insidensial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InsidensialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Insidensial::factory(29)->create();
    }
}
