<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = [
        'knowledge_id',
        'content',
        'edited_by',
        'revision',
    ];

    public function knowledge()
    {
        return $this->belongsTo(Knowledge::class);
    }
    public function editor()
    {
        return $this->belongsTo(User::class, 'edited_by');
    }
}
