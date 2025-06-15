@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('asset/css/login.css') }}">
@endsection

@section('content')
    <form action="{{ route('auth.login') }}" method="POST" id="Login">
        @csrf

        <!-- Left section of the form -->
        <div class="left">
            <div>
                <p>Hello, Welcome!</p>
                <span>dont have an account??</span>
                {{-- {{ route('register') }} --}}
                <a href="{{ route('home.register') }}">
                    <input type="button" value="Register" />
                </a>
            </div>
        </div>

        <!-- Right section of the form -->
        <div class="right">
            <div>
                <h1>Login</h1>
                <!-- Username -->
                <input type="email" name="email" id="email" placeholder="Enter username or email"
                    value={{ old('email') }}>
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>


                <!-- Password -->
                <input type="password" name="password" id="password" placeholder="Enter password">
                @error('password')
                    <div class="error" style="color: red;">{{ $message }}</div>
                @enderror

                <a href="#">Forgot Password?</a>
                <button type="submit">Login</button>
                
            </div>
        </div>
    </form>
@endsection
