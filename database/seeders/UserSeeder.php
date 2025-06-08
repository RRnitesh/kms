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
    ['name' => 'nitesh', 'email' => 'test1@example.com', 'password' => 'password123'],
    ['name' => 'ramesh', 'email' => 'test2@example.com', 'password' => '123password'],
    ['name' => 'suresh', 'email' => 'test3@example.com', 'password' => 'pass456word'],
    ['name' => 'sita', 'email' => 'test4@example.com', 'password' => 'mysecret789'],
    ['name' => 'gita', 'email' => 'test5@example.com', 'password' => 'gita456pass'],
    ['name' => 'hari', 'email' => 'test6@example.com', 'password' => 'hari!pass'],
    ['name' => 'shyam', 'email' => 'test7@example.com', 'password' => 'shyam@123'],
    ['name' => 'ram', 'email' => 'test8@example.com', 'password' => 'ramPass987'],
    ['name' => 'krishna', 'email' => 'test9@example.com', 'password' => 'krs456!'],
    ['name' => 'radha', 'email' => 'test10@example.com', 'password' => 'radhaLove'],
    ['name' => 'manish', 'email' => 'test11@example.com', 'password' => 'manish321'],
    ['name' => 'sabin', 'email' => 'test12@example.com', 'password' => 'sabin2024'],
    ['name' => 'bikash', 'email' => 'test13@example.com', 'password' => 'b!k@sh'],
    ['name' => 'santosh', 'email' => 'test14@example.com', 'password' => 'santosh#44'],
    ['name' => 'anita', 'email' => 'test15@example.com', 'password' => 'anita123'],
    ['name' => 'sunita', 'email' => 'test16@example.com', 'password' => 'sunita456'],
    ['name' => 'pradeep', 'email' => 'test17@example.com', 'password' => 'prad123'],
    ['name' => 'rekha', 'email' => 'test18@example.com', 'password' => 'rekha!pass'],
    ['name' => 'bijay', 'email' => 'test19@example.com', 'password' => 'bijay007'],
    ['name' => 'sarita', 'email' => 'test20@example.com', 'password' => 'sari@2025'],
];


        foreach($data as $item){
            User::create($item);
        }
    }
}
