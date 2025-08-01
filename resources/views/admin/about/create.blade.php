@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create About Section</h2>

    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.about.form')
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
