<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // protected AuthServiceInterface $auth;

    // public function __construct(AuthServiceInterface $auth) {
    //     $this->auth = $auth;
    // }
public function login(LoginRequest $request)
{
    // Validate input
    $validate = $request->all();

    // Map 'username' to 'email' since your database uses 'email'
    $credentials = [
        'email' => $validate['username'],
        'password' => $validate['password'],
    ];

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // Prevent session fixation
        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors([
        'username' => 'The provided credentials do not match our records.',
    ])->withInput();
}

}
