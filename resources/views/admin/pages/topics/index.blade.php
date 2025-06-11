@extends('admin.main.app')

@include('partials.alerts')


@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Topic List</h3>
                        <a href="{{ route('topic.create') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> Create New Topic
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="topicsTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Sort Order</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topics as $topic)
                                    <tr>
                                        <td>
                                            <img src="{{ $topic->user->img ?? 'default.png' }}" alt="Profile Image"
                                                style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
                                        </td>
                                        <td>{{ $topic->name }}</td>
                                        <td>{{ $topic->sort_order }}</td>
                                        <td>
                                            @if ($topic->status)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('topic.show', $topic->id) }}" class="btn btn-info btn-sm mr-1">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <a href="{{ route('topic.edit', $topic->id) }}" class="btn btn-warning btn-sm mr-1">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('topic.destroy', $topic->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this topic?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
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
        $(document).ready(function() {
            $('#usersTable').DataTable({
                responsive: true,
                lengthChange: true,
                paginate: true,
                autoWidth: false,
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
