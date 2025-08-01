@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="text-2xl font-bold mb-4">{{ ucfirst('services') }} List</h2>
    <a href="{{ route('services.create') }}" class="btn btn-success mb-2">+ Add {{ ucfirst('services') }}</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    <a href="{{ route('services.edit', $item->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <form action="{{ route('services.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
