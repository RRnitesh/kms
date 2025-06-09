@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('asset/css/login.css') }}">
@endsection

@section('content')

<form action=" {{ route('users.create') }}" method="POST" id="Register">
    @csrf

    <!-- Left section of the form -->
    <div class="left">
        <div>
            <p>Register!</p>
            <span>Already have an account?</span>
            <a href="{{ route('home.login') }}">
                <input type="button" value="Login" />
            </a>
        </div>
    </div>

    <!-- Right section of the form -->
    <div class="right">
        <div>
            <h1>Register</h1>

            <!-- Full Name -->
            <input type="text" name="name" id="name" placeholder="Full Name" required>

            <!-- Email -->
            <input type="email" name="email" id="email" placeholder="Email Address" required>
           
            <!-- Password -->
            <input type="password" name="password" id="password" placeholder="Password" required>

            <!-- Confirm Password -->
            {{-- <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required> --}}

            <!-- Register Button -->
            <button type="submit">Register</button>

        </div>
    </div>
</form>
@endsection
