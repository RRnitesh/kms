@extends('admin.main.app')



@section('content')
@include('partials.alerts')

<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Edit Topic</h3>
          </div>

          <!-- form start -->
          <form action="{{ route('topic.update', $topic->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
              {{-- User Selection --}}
              <div class="form-group">
                <label for="user_id">User</label>

              </div>

              {{-- Topic Name --}}
              <div class="form-group">
                <label for="name">Topic Name</label>
                <input type="text" name="name" class="form-control" value="{{ $topic->name }}" required>
              </div>

              {{-- Sort Order --}}
              <div class="form-group">
                <label for="sort_order">Sort Order</label>
                <input type="number" name="sort_order" class="form-control" value="{{ $topic->sort_order }}" required>
              </div>

              {{-- Status --}}
              <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                  <option value="1" {{ $topic->status == 1 ? 'selected' : '' }}>Active</option>
                  <option value="0" {{ $topic->status == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-warning">Update Topic</button>
            </div>
          </form>

        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>


@endsection
