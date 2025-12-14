<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ensure an admin user exists with requested credentials and is verified
        $adminEmail = 'admin@gmail.com';
        $adminPassword = '12345678';

        $admin = User::query()->where('email', $adminEmail)->first();
        if (!$admin) {
            $admin = User::factory()->create([
                'name' => 'Admin',
                'email' => $adminEmail,
                'password' => \Illuminate\Support\Facades\Hash::make($adminPassword),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]);
        } else {
            $admin->forceFill([
                'name' => 'Admin',
                'role' => 'admin',
                'password' => \Illuminate\Support\Facades\Hash::make($adminPassword),
                'email_verified_at' => $admin->email_verified_at ?? now(),
            ])->save();
        }

        $this->call([
            PengantinSeeder::class,
        ]);

    }
}
