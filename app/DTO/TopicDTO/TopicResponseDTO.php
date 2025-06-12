<?php

namespace App\DTO\TopicDTO;

use App\Models\Topic;

class TopicResponseDTO
{
    public int $id;
    public string $user_name;
    public string $name;
    public int $sort_order;
    public bool $status;

    public string $email;

    // Constructor to initialize DTO properties
    public function __construct(
        int $id,
        string $user_name,
        string $name,
        int $sort_order,
        bool $status,

        string $email,
    ) {
        $this->id = $id;
        $this->user_name = $user_name;
        $this->name = $name;
        $this->sort_order = $sort_order;
        $this->status = $status;

        $this->email = $email;
    }

    // Factory method: Converts a Topic model to DTO
    public static function fromModel(Topic $topic): self
    {
        return new self(
            $topic->id,
            $topic->user->name ?? 'unknown', //if topic id has no relation to user
            $topic->name,
            $topic->sort_order,
            $topic->status,

            $topic->user->email,
        );
    }

    // Converts a collection of topics to an array of DTOs
    public static function fromCollection(iterable $topics): array
    {
        return array_map(
            fn(Topic $topic) => self::fromModel($topic),
            is_array($topics) ? $topics : $topics->all()
        );
    }

}
