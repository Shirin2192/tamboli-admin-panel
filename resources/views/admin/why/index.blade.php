@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{ route('admin.why.create') }}" class="btn btn-primary mb-3">Add New</a>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

    <table class="table table-bordered" id="whyTable">
        <thead>
            <tr>
                <th>Icon</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>
                        @if($item->icon)
                            <img src="{{ asset($item->icon) }}" width="50">
                        @endif
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ Str::limit($item->description, 100) }}</td>
                    <td>
                        <a href="{{ route('admin.why.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.why.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('#whyTable').DataTable();
    });
</script>
@endpush
