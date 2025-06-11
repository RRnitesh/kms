<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trash extends Model
{
    protected $table = 'trashes';
    protected $fillable = [
        'user_id',
        'old_path',
        'trashed_path'
    ];

}
