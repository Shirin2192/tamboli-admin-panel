@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Add Why Choose Us</h2>
    <form action="{{ route('admin.why.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Icon</label>
            <input type="file" name="icon" class="form-control">
        </div>
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
