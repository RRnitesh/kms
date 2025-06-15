<?php

namespace App\Services\Implementation;

use App\Repository\Interface\AuthRepositoryInterface;
use App\Services\Interface\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthService implements AuthServiceInterface
{


  public function attemptLogin($credentials)
  {
    return Auth::attempt($credentials);
  }

  public function logout(Request $request )
  {
    Auth::logout(); 
    $request->session()->invalidate(); // seesion data is cleared
    $request->session()->regenerateToken(); // generated csrf token
  }
}