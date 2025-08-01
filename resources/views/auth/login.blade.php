@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
        <div class="text-center mb-4">
            <!-- Logo Display -->
            <img src="{{ asset('storage/logo.svg') }}" alt="Logo" style="height: 80px;">
        </div>
        <h4 class="text-center mb-3">Welcome to Tamboli Group Admin</h4>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="you@example.com" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Login</button> <!-- Green button -->
            </div>
        </form>
    </div>
</div>
@endsection
