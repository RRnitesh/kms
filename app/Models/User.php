<?php

namespace App\Models;

use App\Constant\Upload;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    protected $fillable = ['name', 'email', 'password', 'profile_image_path'];

    public function roles() // relationship with roles table
    {   // 
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    // when user visit protected page; first hit the controller; then blade view
    // from the blade view we call method- haspermission 
    // then the system gets the role of the logged in user 
    public function hasPermission(string $permission)
    {
        foreach ($this->roles as $role) {
            if (in_array($permission, $role->permission ?? [])) {
                return true;
            }
        }
        return false;
    }


    public function getProfileImageUrlAttribute()
    {
        if ($this->profile_image) {
            return asset('storage/' . Upload::USER_PROFILE_PATH . '/' . $this->profile_image);
        }
        // fallback default image path
        // return asset('images/default-profile.png');
    }
}
