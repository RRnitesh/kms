<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'), // ✅ hashed
            ],
            [
                'name' => 'contributor',
                'email' => 'contributor@example.com',
                'password' => Hash::make('password'), // ✅ hashed
            ],
            [
                'name' => 'user',
                'email' => 'user@example.com',
                'password' => Hash::make('password'), // ✅ hashed
            ],
        ];

        foreach ($data as $item) {
            User::create($item);
        }
    }
}
