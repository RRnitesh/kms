<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubTopic extends Model
{
    protected $fillable = [
        'topic_id',
        'name',
        'sort_order',
        'status',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
