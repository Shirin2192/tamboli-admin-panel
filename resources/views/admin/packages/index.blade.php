@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Packages</h2>

    <div class="card shadow border-0">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Packages</h5>
            <a href="{{ route('packages.create') }}" class="btn btn-light btn-sm">
                <i class="bi bi-plus-circle"></i> Add New
            </a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered table-striped align-middle" id="packagesTable">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packages as $package)
                    <tr>
                        <td>{{ $package->id }}</td>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->price }}</td>
                        <td>{{ $package->category->category_name ?? 'N/A' }}</td>
                        <td class="text-center">
                            <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-sm btn-warning me-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('packages.destroy', $package->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this package?')">
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
        $('#packagesTable').DataTable({
            responsive: true,
            pageLength: 10,
            order: [[0, 'desc']],
            columnDefs: [
                { orderable: false, targets: [4] }
            ],
            language: {
                searchPlaceholder: "Search packages...",
                search: "",
            }
        });
    });
</script>
@endpush
