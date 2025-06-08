{{-- users.show --}}
@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>User Details</h1>
    <div class="card p-4">
      <p><strong>ID:</strong> {{ $user->id }}</p>
      <p><strong>Name:</strong> {{ $user->name }}</p>
      <p><strong>Email:</strong> {{ $user->email }}</p>
      {{-- <p><strong>password:</strong> {{ $user->password }}</p> --}}
    </div>
  </div>
@endsection
