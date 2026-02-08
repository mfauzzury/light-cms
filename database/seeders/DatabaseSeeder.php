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
        // Seed roles and permissions first
        $this->call(RolePermissionSeeder::class);

        // Create admin user for Filament CMS
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@lightcms.local',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        // Assign Super Admin role
        $user->assignRole('Super Admin');
    }
}
