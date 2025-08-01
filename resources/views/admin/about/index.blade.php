@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow border-0">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">About Section</h5>

            @if(!$about)
                <a href="{{ route('admin.about.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-circle"></i> Create
                </a>
            @endif
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            @if($about)
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('about.edit') }}" class="btn btn-warning me-2 btn-sm">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                   
                    <!-- <form action="{{ route('about.destroy', $about->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</button>
                    </form> -->
                 </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <h4 class="fw-bold">{{ $about->main_title }}</h4>
                        <p>{{ $about->description }}</p>

                        <ul class="list-group mb-3">
                            <li class="list-group-item"><strong>Experience:</strong> {{ $about->experience_years }} years</li>
                            <li class="list-group-item"><strong>Destinations:</strong> {{ $about->destinations }}</li>
                            <li class="list-group-item"><strong>Pilgrims Served:</strong> {{ $about->pilgrims_served }}</li>
                        </ul>

                        <p>{{ $about->bottom_description }}</p>

                        @if($about->video_url)
                            <p><strong>Video:</strong> <a href="{{ $about->video_url }}" target="_blank" class="text-decoration-none">Watch</a></p>
                        @endif
                    </div>

                    <div class="col-md-6 text-center">
                        @if($about->image1)
                            <img src="{{ asset('storage/' . $about->image1) }}" class="img-thumbnail mb-3" style="max-height: 180px;" alt="Image 1">
                        @endif
                        @if($about->image2)
                            <img src="{{ asset('storage/' . $about->image2) }}" class="img-thumbnail" style="max-height: 180px;" alt="Image 2">
                        @endif
                    </div>
                </div>
            @else
                <div class="text-center">
                    <p>No about section found.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
