<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
            LokasiSeeder::class,
            UserSeeder::class
        ]);

        $user = User::factory()->create([
            'name' => 'Iqbal farhan syuhada',
            'username' => 'admin',
            'password' => 'adminoke',
        ]);
        $user->assignRole('superadmin');

    }
}
