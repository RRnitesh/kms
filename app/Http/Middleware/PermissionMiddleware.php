<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PermissionMiddleware
{

    public function handle(Request $request, Closure $next, $permission)
    {
        $user = Auth::user(); // checking user session 
        if (!$user) {
            abort(403, 'unauthorized. please login');
        }

        // loop each role assigned to user .

        foreach ($user->roles as $role) { // we defined roles() function in user model many to many 
            // so $user->roles will apply join here . with role table
            if (in_array($permission, $role->permission)) {
                // permission field is now array so we can loop through it 
                return $next($request);
            }
        }
        abort(403, 'You do not have permission to access this resource.');
    }
}
