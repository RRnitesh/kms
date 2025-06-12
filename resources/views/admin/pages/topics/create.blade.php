@extends('admin.main.app')


@section('content')
@include('partials.alerts')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Topic</h3>
                        </div>

                        <!-- form start -->
                        <form action="{{ route('topic.store') }}" method="POST">
                            @csrf

                            <div class="card-body">


                                {{-- Topic Name --}}
                                <div class="form-group">
                                    <label for="name">Topic Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter topic name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                {{-- Status --}}
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create Topic</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
