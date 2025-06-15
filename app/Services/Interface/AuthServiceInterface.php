<?php
namespace App\Services\Interface;

use Illuminate\Http\Request;

interface AuthServiceInterface
{
  public function attemptLogin($credentials);
  
  public function logout(Request $request);
}