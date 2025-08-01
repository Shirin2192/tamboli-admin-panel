@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Package Categories</h2>

    <div class="card shadow border-0">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Package Categories</h5>
            <a href="{{ route('package-categories.create') }}" class="btn btn-light btn-sm">
                <i class="bi bi-plus-circle"></i> Add New
            </a> 
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered table-striped align-middle" id="categoriesTable">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td class="text-center">
                            <a href="{{ route('package-categories.edit', $category->id) }}" class="btn btn-sm btn-warning me-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('package-categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">
                                    <i class="bi bi-trash3-fill"></i>
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
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#categoriesTable').DataTable({
            responsive: true,
            pageLength: 10,
            order: [[0, 'desc']], // default sort by ID descending
            columnDefs: [
                { orderable: false, targets: [2] } // disable sort on Actions column
            ],
            language: {
                searchPlaceholder: "Search categories...",
                search: "",
            }
        });
    });
</script>
@endpush
