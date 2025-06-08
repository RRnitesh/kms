@extends('layouts.app')


{{-- @push('styles')
    @vite(['resources/css/userFrom.css'])
@endpush --}}


@section('content')
    <div class="container">
    <h2>Create User</h2>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" >
            
            <span class="text-danger">
                @error('name')
                {{$message}}  
                @enderror
            </span>
          
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" >

            <span class="text-danger">
            @error('email')
                {{$message}}  
            @enderror
            </span>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password" class="form-control" >

            <span class="text-danger">
                @error('password')
                    {{$message}}  
                @enderror
            </span>

        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
</div>
@endsection





