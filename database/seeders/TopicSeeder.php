<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics = [
            ['name' => 'Laravel',   'sort_order' => 1],
            ['name' => 'SQL',       'sort_order' => 2],
            ['name' => 'Hardware',  'sort_order' => 3],
            ['name' => 'Software',  'sort_order' => 4],
            ['name' => 'Networking', 'sort_order' => 5],
        ];

        foreach ($topics as $topic) {
            Topic::create([
                'name'       => $topic['name'],
                'sort_order' => $topic['sort_order'],
                'status'     => true,
                'user_id'    => rand(4,6),
            ]);
        }
    }
}
