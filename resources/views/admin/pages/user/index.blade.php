@extends('admin.main.app')

@section('content')

@include('partials.alerts')

<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header bg-primary d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">User List</h3>
            <a href="{{ route('users.create') }}" class="btn btn-success btn-sm">
              <i class="fas fa-user-plus"></i> Create New User
            </a>
          </div>
          <div class="card-body table-responsive p-0" style="max-height: 400px;">
            <table id="example1" class="table table-head-fixed table-hover table-striped text-nowrap">
              <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>img</th>
                  <th>Action</th>                
                </tr>
              </thead>
              <tbody>
                @forelse($users as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    <img src="{{ asset('storage/' . $user->profile_image)}}" alt="" 
                    style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
                  </td>
                  <td>
                    {{-- Edit Button --}}
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                      <i class="fas fa-edit"></i> Edit
                    </a>

                    <!-- Delete Button triggers modal -->
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUserModal{{ $user->id }}">
                      <i class="fas fa-trash"></i> Delete
                  </button>
                  <!-- Include the reusable delete modal -->
                  @include('partials.delete_modal', [
                      'modalId' => 'deleteUserModal' . $user->id,
                      'deleteRoute' => route('users.delete', $user->id),
                      'itemName' => $user->name
                  ])
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="3" class="text-center text-muted">No users found.</td>
                </tr>
                @endforelse
              </tbody>
            </table>

            <div class="d-flex justify-content-center mt-3">
              {{ $users->links() }}
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection