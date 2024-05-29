@extends('template.auth')
@section('title', 'Login')
@section('content')

    <p class="fs-1 fw-bold">LOGIN here ..</p>
    <form action="{{ route('login.authenticate') }}" method="POST" class="form">
        @csrf
        <div class="mb-1 label">Email</div>
        <input type="text" class=" form-control" name="email" value="{{ old('email') }}" required placeholder="Masukkan Email">
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="mb-1 mt-3 label">Password</div>
        <input type="password" class="mb-3 form-control" name="password" required placeholder="Masukkan Password">

        <div>

            <button type="submit" class="btn btn-custom">Login</button>
        </div>
    </form>

    @push('scripts')
        <script>
            function closeAlert() {
                var alert = document.querySelector('.alert');
                alert.style.display = 'none';
            }
        </script>
    @endpush
@endsection
