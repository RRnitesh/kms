<?php

namespace App\DTO\TopicDTO;

class TopicDTO
{
    public int $user_id;
    public string $name;
    public int $sort_order;
    public bool $status;

    public function __construct($data) 
    {
        $this->user_id = $data['user_id'];
        $this->name = $data['name'];
        $this->sort_order = $data['sort_order'];
        $this->status = $data['status'];
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'name' => $this->name,
            'sort_order' => $this->sort_order,
            'status' => $this->status,
        ];
    }
}