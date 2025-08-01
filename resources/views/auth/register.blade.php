@extends('layouts.guest')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-lg p-4" style="max-width: 450px; width: 100%;">
        <div class="text-center mb-4">
            <!-- Logo -->
            <img src="{{ asset('storage/logo.svg') }}" alt="Tamboli Logo" style="height: 80px;">
        </div>
        <h4 class="text-center mb-3">Create Your Account</h4>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="you@example.com" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Create password" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Re-enter password" required>
            </div>
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-success">Register</button>
            </div>

            <div class="text-center">
                <small>Already have an account? <a href="{{ route('login') }}">Login here</a></small>
            </div>
        </form>
    </div>
</div>
@endsection
