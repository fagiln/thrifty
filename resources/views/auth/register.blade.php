@extends('template.auth')
@section('title', 'Register')
@section('content')
    <p class="fs-1 fw-bold">Register here ..</p>
    <form action="{{ route('register.store') }}" method="POST" class="form">
        @csrf
        <div class="mb-1 label">Username</div>
        <input type="text" class=" form-control" name="username" required value="{{ old('username') }}">
        @error('username')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="mb-1 mt-3 label">Email</div>
        <input type="email" class=" form-control" name="email" required value="{{ old('email') }}">
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="mb-1 mt-3 label">First Name</div>
        <input type="text" class=" form-control" name="first_name" required value="{{ old('first_name') }}">
        @error('first_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="mb-1 mt-3 label">Last Name</div>
        <input type="text" class=" form-control" name="last_name" required value="{{ old('last_name') }}">
        @error('last_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="mb-1 mt-3 label">Password</div>
        <input type="password" class=" form-control" name="password" required>
        @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="mb-1 mt-3 label">Confirm Password</div>
        <input type="password" class=" form-control" name="password_confirmation" required>
        @error('password_confirmation')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <div>
            <button type="submit" class="mt-3 btn btn-custom">Register</button>
        </div>
    </form>
    @push('scripts')
     
    @endpush
@endsection
