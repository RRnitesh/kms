@extends('admin.main.app')

@section('content')
@include('partials.alerts')

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">SubTopic List</h3>
                        <a href="{{ route('subtopic.create') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> Create New SubTopic
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="subTopicsTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Topic</th>
                                    <th>Name</th>
                                    <th>Sort Order</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subTopics as $subTopic)
                                    <tr>
                                        <td>{{ $subTopic->topic->name ?? 'N/A' }}</td>
                                        <td>{{ $subTopic->name }}</td>
                                        <td>{{ $subTopic->sort_order }}</td>
                                        <td>
                                            @if ($subTopic->status)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a href="" class="btn btn-info btn-sm mr-1">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <a href="{{ route('subtopic.edit', $subTopic->id) }}" class="btn btn-warning btn-sm mr-1">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('subtopic.destroy', $subTopic->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this subtopic?');">
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
    $(document).ready(function () {
        $('#subTopicsTable').DataTable({
            responsive: true,
            lengthChange: true,
            paginate: true,
            autoWidth: false,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#subTopicsTable_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
