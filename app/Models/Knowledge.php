<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    protected $fillable = [
        'title',
        'user_id',
    ];

    public function details()
    {
        return $this->hasMany(Detail::class);
    }

    public function subTopic()
    {
        return $this->belongsTo(SubTopic::class);
    }

}
