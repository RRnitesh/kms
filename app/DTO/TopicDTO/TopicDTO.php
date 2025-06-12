<?php

namespace App\DTO\TopicDTO;

class TopicDTO
{

    public string $name;
    public bool $status;


    public function __construct($data) 
    {
        $this->name = $data['name'];
        $this->status = $data['status'];
    }

    public function toArray(): array
    {
        return [

            'name' => $this->name,
            'status' => $this->status,
        ];
    }
}