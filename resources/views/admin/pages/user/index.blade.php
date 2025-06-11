@extends('admin.main.app')

@include('partials.alerts')

@section('content')



@section('content')
  <section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-primary d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">User List</h3>
            <a href="{{ route('users.create') }}" class="btn btn-success btn-sm">
              <i class="fas fa-user-plus"></i> Create New User
            </a>
          </div>
          <div class="card-body">
            <table id="usersTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Action</th>                
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                  <td>
                    <img src="{{ $user->profile_image_url }}" alt="Profile Image"
                        style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;border: 2px solid #fff;">
                  </td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                      <i class="fas fa-edit"></i> Edit
                    </a>
                    <button type="button" class="btn btn-sm btn-danger delete-user-btn"
                      data-id="{{ $user->id }}" data-name="{{ $user->name }}">
                      <i class="fas fa-trash"></i> Delete
                    </button>
                    <form id="delete-form-{{ $user->id }}" method="POST" action="{{ route('users.delete', $user->id) }}" style="display: none;">
                      @csrf
                      @method('DELETE')
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('script')
<script>
  $(document).ready(function () {
  $('#usersTable').DataTable({
    responsive: true,
    lengthChange: true,
    paginate:true,
    autoWidth: false,
    buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
</script>
@endsection
