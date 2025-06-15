<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    
    protected $fillable = [
        'user_id',
        'name',
        'status',
        'sort_order',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subtopic()
    {
        return $this->hasMany(SubTopic::class);
    }
}
