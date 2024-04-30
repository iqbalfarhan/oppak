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
        $user = User::factory()->create([
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => 'adminoke'
        ]);
        $user->assignRole('superadmin');

        $user = User::factory()->create([
            'name' => 'Iqbal Farhan Syuhada',
            'username' => 'iqbal',
            'password' => 'adminoke'
        ]);
        $user->assignRole('user');

        User::factory(10)->create()->each(fn($user) => $user->assignRole('user'));
    }
}
