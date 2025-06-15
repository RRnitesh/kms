<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'permission',
    ];

    protected $casts = [
        'permission' => 'array',
    ];
    // returns 'permission' column of database in array format.


    public function users() // relation with user model 
    {
        return $this->belongsToMany(User::class, 'user_roles');
        // many to many relationship with User using the user_role table
    }
}
