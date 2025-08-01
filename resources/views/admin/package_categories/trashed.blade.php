@extends('layouts.app')
@section('content')
<h2>Trashed Categories</h2>
<table>
    <tr><th>Name</th><th>Actions</th></tr>
    @foreach($categories as $cat)
    <tr>
        <td>{{ $cat->category_name }}</td>
        <td>
            <a href="{{ route('package-categories.restore', $cat->id) }}">Restore</a>
            <form action="{{ route('package-categories.forceDelete', $cat->id) }}" method="POST" style="display:inline">
                @csrf @method('DELETE')
                <button type="submit" onclick="return confirm('Permanently delete?')">Delete Permanently</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
