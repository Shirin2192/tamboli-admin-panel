@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-white">
            <h4>Edit Banner</h4>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('banners.update', $banner->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Place</label>
                    <input type="text" name="place" value="{{ $banner->place }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" value="{{ $banner->title }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="4" class="form-control" required>{{ $banner->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Button Text</label>
                    <input type="text" name="button_text" value="{{ $banner->button_text }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Button Link</label>
                    <input type="url" name="button_link" value="{{ $banner->button_link }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Image</label><br>
                    <img src="{{ asset('storage/' . $banner->image) }}" width="150" class="mb-2 rounded">
                    <input type="file" name="image" class="form-control">
                    <small class="text-muted">Leave blank to keep current image</small>
                </div>

                <button type="submit" class="btn btn-primary">Update Banner</button>
            </form>
        </div>
    </div>
</div>
@endsection
