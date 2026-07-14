<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = 'admin@example.com';

        $data = [
            'name' => 'Admin',
            'email' => $email,
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ];

        if (Schema::hasColumn('users', 'is_admin')) {
            $data['is_admin'] = true;
        }

        User::updateOrCreate(['email' => $email], $data);
    }
}
