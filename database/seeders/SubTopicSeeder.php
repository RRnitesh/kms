<?php

namespace Database\Seeders;

use App\Models\SubTopic;
use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subTopics = [
            'Laravel' => ['Artisan', 'Eloquent ORM', 'Middleware', 'Blade', 'Routing'],
            'SQL' => ['Joins', 'Normalization', 'Indexes', 'Stored Procedures'],
            'Hardware' => ['Printers', 'Motherboard', 'RAM', 'CPU'],
            'Software' => ['XAMPP', 'Operating Systems', 'Antivirus'],
            'Networking' => ['IP Addressing', 'Subnetting', 'DNS', 'Firewalls'],
        ];

        foreach ($subTopics as $topicName => $subTopicList) {
            $topic = Topic::where('name', $topicName)->first();
            if (!$topic) continue;

            foreach ($subTopicList as $index => $name) {
                SubTopic::create([
                    'topic_id'   => $topic->id,
                    'name'       => $name,
                    'sort_order' => $index + 1,
                    'status'     => true,
                ]);
            }
        }
    }
}
