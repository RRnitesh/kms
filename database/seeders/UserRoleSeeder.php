<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


    $data = [
        ['user_id' => 4, 'role_id' => 3], // admin
        ['user_id' => 5, 'role_id' => 2], // contributor
        ['user_id' => 6, 'role_id' => 1], // user
    ];
    foreach($data as $item)
    {
        UserRole::create($item);
    }

    }
    
}
