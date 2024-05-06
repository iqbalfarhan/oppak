<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate([
            'username' => 'super',
        ], [
            'name' => 'Super Administrator',
            'password' => 'adminoke'
        ]);
        $user->assignRole('superadmin');
    }
}
