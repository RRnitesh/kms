<?php

namespace App\DTO\SubTopicDTO;

use App\Models\SubTopic;
use Illuminate\Support\Collection;

class SubTopicDTO
{
    public int $id;
    public int $topic_id;
    public string $name;
    public int $sort_order;
    public bool $status;

    // Optional: Nested topic information (if eager loaded)
    public ?array $topic = null;

    public function __construct(
        int $id,
        int $topic_id,
        string $name,
        int $sort_order,
        bool $status,
        ?array $topic = null
    ) {
        $this->id = $id;
        $this->topic_id = $topic_id;
        $this->name = $name;
        $this->sort_order = $sort_order;
        $this->status = $status;
        $this->topic = $topic;
    }

    /**
     * Create DTO from SubTopic model
     */
    public static function fromModel(SubTopic $subTopic): self
    {
        return new self(
            $subTopic->id,
            $subTopic->topic_id,
            $subTopic->name,
            $subTopic->sort_order,
            $subTopic->status,
            $subTopic->relationLoaded('topic') ? [
                'id' => $subTopic->topic->id,
                'name' => $subTopic->topic->name,
            ] : null
        );
    }

    /**
     * Convert a collection of SubTopic models to DTOs
     */
    public static function fromCollection(Collection $subTopics): array
    {
        return $subTopics->map(function (SubTopic $subTopic) {
            return self::fromModel($subTopic);
        })->toArray();
    }

    /**
     * Minimal DTO for dropdowns (id + name only)
     */
    public static function idAndNameOnly(SubTopic $subTopic): array
    {
        return [
            'id' => $subTopic->id,
            'name' => $subTopic->name,
        ];
    }

    /**
     * Convert a collection to id + name only (for dropdown lists)
     */
    public static function idAndNameCollection(Collection $subTopics): array
    {
        return $subTopics->map(function (SubTopic $subTopic) {
            return self::idAndNameOnly($subTopic);
        })->toArray();
    }
}
