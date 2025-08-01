@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Update About Section</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('about.update', $about->id ?? 1) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Main Title</label>
                        <input type="text" name="main_title" class="form-control" value="{{ old('main_title', $about->main_title ?? '') }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Video URL</label>
                        <input type="url" name="video_url" class="form-control" value="{{ old('video_url', $about->video_url ?? '') }}">
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4" required>{{ old('description', $about->description ?? '') }}</textarea>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Experience Years</label>
                        <input type="number" name="experience_years" class="form-control" value="{{ old('experience_years', $about->experience_years ?? '') }}" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Destinations</label>
                        <input type="number" name="destinations" class="form-control" value="{{ old('destinations', $about->destinations ?? '') }}" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Pilgrims Served</label>
                        <input type="number" name="pilgrims_served" class="form-control" value="{{ old('pilgrims_served', $about->pilgrims_served ?? '') }}" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">Bottom Description</label>
                        <textarea name="bottom_description" class="form-control" rows="3" required>{{ old('bottom_description', $about->bottom_description ?? '') }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Image </label>
                        <input type="file" name="image1" class="form-control">
                        @if(!empty($about->image1))
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $about->image1) }}" width="120" class="rounded shadow-sm border">
                            </div>
                        @endif
                    </div>

                   <!--  <div class="col-md-6 mb-3">
                        <label class="form-label">Image 2</label>
                        <input type="file" name="image2" class="form-control">
                        @if(!empty($about->image2))
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $about->image2) }}" width="120" class="rounded shadow-sm border">
                            </div>
                        @endif
                    </div> -->
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-1"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
