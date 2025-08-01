@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Banners</h2>
    <!-- <a href="{{ route('banners.create') }}" class="btn btn-success mb-3">Add Banner</a> -->
   <div class="card shadow border-0">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">All Banners</h5>
        <a href="{{ route('banners.create') }}" class="btn btn-light btn-sm">
            <i class="bi bi-plus-circle"></i> Add New
        </a> 
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered table-striped align-middle" id="bannersTable">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Place</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Button Text</th>
                    <th>Button Link</th>
                    <th>Image</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banners as $banner)
                <tr>
                    <td>{{ $banner->id }}</td>
                    <td>{{ $banner->place }}</td>
                    <td>{{ $banner->title }}</td>
                    <td>{{ Str::limit($banner->description, 50) }}</td>
                    <td>{{ $banner->button_text }}</td>
                    <td><a href="{{ $banner->button_link }}" target="_blank" class="text-decoration-none">{{ $banner->button_link }}</a></td>
                    <td>
                        @if($banner->image)
                            <img src="{{ asset('storage/' . $banner->image) }}" class="img-thumbnail" style="max-height: 50px;">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-sm btn-warning me-1">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('banners.destroy', $banner->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this banner?')">
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
        $('#bannersTable').DataTable({
            responsive: true,
            pageLength: 10,
             order: [[0, 'desc']], // default sort by ID descending
            language: {
                searchPlaceholder: "Search banners...",
                search: "",
            }
        });
    });
</script>

@endpush
