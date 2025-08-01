@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit About Section</h2>

    <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.about.form', ['about' => $about])
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
