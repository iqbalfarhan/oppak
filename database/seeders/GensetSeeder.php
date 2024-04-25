<?php

namespace Database\Seeders;

use App\Models\Genset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GensetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genset::factory(30)->create();
    }
}
