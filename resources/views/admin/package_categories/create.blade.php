@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg rounded-lg border-0">
        <div class="card-header bg-success text-white d-flex align-items-center">
            <i class="bi bi-tags-fill me-2 fs-4"></i>
            <h4 class="mb-0">Add Package Category</h4>
        </div>

        <div class="card-body p-4">
            <form method="POST" action="{{ route('package-categories.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Category Name <span class="text-danger">*</span></label>
                    <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" placeholder="e.g., Umrah, Hajj, Ramadan">
                    @error('category_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="text-end">
                    <a href="{{ route('package-categories.index') }}" class="btn btn-secondary me-2">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-save me-1"></i> Save Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
