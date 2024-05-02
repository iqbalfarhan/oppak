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

        $user = User::updateOrCreate([
            'username' => 'admin',
        ], [
            'name' => 'Administrator',
            'password' => 'adminoke'
        ]);
        $user->assignRole('admin');

        $user = User::updateOrCreate([
            'username' => 'iqbal',
        ], [
            'name' => 'Iqbal Farhan Syuhada',
            'password' => 'adminoke'
        ]);
        $user->assignRole('user');

        User::factory(10)->create()->each(fn($user) => $user->assignRole('user'));
    }
}
