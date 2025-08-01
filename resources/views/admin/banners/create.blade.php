@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg rounded-lg border-0">
        <div class="card-header bg-success text-white d-flex align-items-center">
            <i class="bi bi-image-fill me-2 fs-4"></i>
            <h4 class="mb-0">Add New Banner</h4>
        </div>

        <div class="card-body p-4">          

           <form method="POST" action="{{ route('banners.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Place <span class="text-danger">*</span></label>
                        <input type="text" name="place" class="form-control @error('place') is-invalid @enderror" placeholder="e.g., Makkah & Madinah">
                        @error('place')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Banner Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="e.g., Sacred Umrah">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" placeholder="Enter banner description"></textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Button Text <span class="text-danger">*</span></label>
                        <input type="text" name="button_text" class="form-control @error('button_text') is-invalid @enderror" placeholder="e.g., Book Your Umrah">
                        @error('button_text')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Button Link <span class="text-danger">*</span></label>
                        <input type="url" name="button_link" class="form-control @error('button_link') is-invalid @enderror" placeholder="e.g., https://your-link.com">
                        @error('button_link')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Banner Image <span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="text-end">
                    <a href="{{ route('banners.index') }}" class="btn btn-secondary me-2">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-save me-1"></i> Save Banner
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
