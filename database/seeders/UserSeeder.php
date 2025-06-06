<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'nitesh', 'email' => 'test@example.com', 'password' => 'password123'],
            ['name' => 'ramesh', 'email' => 'test2@example.com', 'password' => '123password'],
            
        ];

        foreach($data as $item){
            User::create($item);
        }
    }
}
