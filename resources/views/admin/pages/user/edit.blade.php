@extends('admin.main.app')

@section('content')
    @include('partials.alerts')

    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit User</h3>
            </div>

            <div class="buton">
                <form action="{{ route('users.trashData') }}" method="GET">

                    <input type="hidden" value="{{ $user->id }}" name='user_id'>

                    <input type="hidden" value="1" name='data_id'>
                    <button type="submit">view trash</button>

                </form>
            </div>

            <!-- form start -->
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="row">
                        <!-- Profile image -->
                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                            <div
                                style="width: 200px; height: 200px; border: 1px solid #ccc; overflow: hidden; border-radius: 50%;">
                                <img id="profile_image_preview" src="{{ $user->profile_image_url }}" alt="Profile Image"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </div>



                        <!-- Form fields -->
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}" required>
                            </div>

                            <!-- You can add profile image upload option too -->
                            <div class="form-group">
                                <label for="profile_image">Change Profile Image</label>
                                <input type="file" class="form-control-file" name="profile_image" id="profile_image"
                                    accept="image/*" onchange="previewImage(this)">
                            </div>
                        </div>
                    </div>
                </div>



                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
            @if ($user->profile_image)
                <form action="{{ route('users.deleteImage', $user->id) }}" method="POST" style="margin-top: 10px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete profile image?')">
                        <i class="fas fa-trash"></i> Delete Image
                    </button>
                </form>
            @endif

            <a href="{{ route('users.download', $user->id) }}">
                <button type="submit" class="btn btn-primary ">download
                </button>
            </a>



        </div>
    </div>
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('profile_image_preview').src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
