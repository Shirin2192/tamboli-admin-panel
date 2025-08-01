@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Why Choose Us</h2>
    <form action="{{ route('admin.why.update', $why->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('POST')
        <div class="mb-3">
            <label>Icon</label><br>
            @if($why->icon)
                <img src="{{ asset($why->icon) }}" width="50"><br>
            @endif
            <input type="file" name="icon" class="form-control">
        </div>
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $why->title }}" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ $why->description }}</textarea>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
