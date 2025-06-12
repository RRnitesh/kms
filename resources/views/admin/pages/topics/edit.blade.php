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
                                <div class="form-group">
                                    <label>User</label>
                                    <input type="text" class="form-control" value="{{ $topic->user_id }}" readonly>
                                </div>

                                {{-- Topic Name --}}
                                <div class="form-group">
                                    <label for="name">Topic Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ $topic->name }}"
                                        required>

                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Sort Order --}}
                                <div class="form-group">
                                    <label for="sort_order">Sort Order</label>

                                    <input type="number" class="form-control" value="{{ $topic->sort_order }}" readonly>

                                </div>

                                {{-- Status --}}
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="1" {{ $topic->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $topic->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('topic.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
