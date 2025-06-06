@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css')}}">
@endpush


@section('content')
<div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <div class="login-logo mb-3">
                            <a href="#" class="h2 text-primary font-weight-bold">K<span class="text-dark">M</span><span class="text-primary">S</span></a>
                        </div>
                        <h4 class="mb-0">Welcome Back</h4>
                        <p class="text-muted">Sign in to continue</p>
                    </div>

                    <form method="POST" action="{{ route('auth.login') }}">
                        @csrf

                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-envelope text-muted"></i>
                                </span>
                                <input type="email" name="email" class="form-control border-start-0" 
                                       placeholder="Email" required autofocus>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input type="password" name="password" class="form-control border-start-0" 
                                       placeholder="Password" required>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            {{-- <a href="{{ route('') }}" class="text-decoration-none">Forgot password?</a> --}}
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 mb-3">
                            <i class="fas fa-sign-in-alt me-2"></i> Sign In
                        </button>

                        <div class="text-center text-muted mt-3">
                            Don't have an account? 
                            {{-- <a href="{{ route('') }}" class="text-decoration-none">Sign up</a> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection