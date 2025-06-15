<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Interface\AuthServiceInterface;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    protected $authService;
    protected $view = 'auth.';

    public function __construct(AuthServiceInterface $auth)
    {
        $this->authService = $auth;
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if ($this->authService->attemptLogin($credentials)) {
            // return redirect()->intended('admin.dashboard');
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()
            ->withErrors(['email' => 'Invalid credentials, access denied'])
            ->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request);
        return redirect()->route('home.index');
    }
}
