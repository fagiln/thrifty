@extends('template.layout')
@section('title', 'Add Seller')
@section('content')

    @if (session('add'))
        <div class="mt-3">
            <div id="success-alert" class="alert alert-success d-flex justify-content-between fade show" role="alert">
                {{ session('add') }}

            </div>
        </div>
    @endif

    <form action="{{ route('seller.add.seller.store') }}" method="POST" class="form" enctype="multipart/form-data">
        @csrf
        <div class="mb-1 mt-3 label">Image</div>

        <input type="file" id="fileInput" class=" form-control" name="file"  >
        <div class="d-flex mt-2">
            <div class="label mr-3">Preview :</div>
            <img id="previewImage" src="#" alt="Preview Gambar" style="display: none; margin-top: 10px; max-width: 200px;">
        </div>
        @error('file')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="row ">
            <div class="col-md-6">

                <div class="mb-1 label">Username</div>
                <input type="text" class=" form-control" name="username" required value="{{ old('username') }}"
                    placeholder="Masukkan Username">
                @error('username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">

                <div class="mb-1 label">Email</div>
                <input type="email" class=" form-control" name="email" required value="{{ old('email') }}"
                    placeholder="Masukkan Email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row ">
            <div class="col-md-6">
                <div class="mb-1 mt-3 label">First Name</div>
                <input type="text" class=" form-control" name="first_name" required value="{{ old('first_name') }}"
                    placeholder="Masukkan Nama Awal">
                @error('first_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">

                <div class="mb-1 mt-3 label">Last Name</div>
                <input type="text" class=" form-control" name="last_name" value="{{ old('last_name') }}"
                    placeholder="Masukkan Nama Akhir (optional)">
                @error('last_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
        </div>
        <div class="row ">
            <div class="col-md-6">
                <div class="mb-1 mt-3 label">Password</div>
                <input type="password" class=" form-control" name="password" required placeholder="Masukkan Password">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="mb-1 mt-3 label">Confirm Password</div>
                <input type="password" class=" form-control" name="password_confirmation" required
                    placeholder="Ulangi Password">
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
        </div>
        <div>
            <button type="submit" class="mt-3 btn btn-primary">Add Seller</button>
        </div>
    </form>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var alert = document.getElementById('success-alert');
                if (alert) {
                    setTimeout(function() {
                        var bootstrapAlert = new bootstrap.Alert(alert);
                        bootstrapAlert.close();
                    }, 5000); // waktu dalam milidetik (5000 ms = 5 detik)
                }
            });
            document.getElementById('fileInput').addEventListener('change', function(event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var previewImage = document.getElementById('previewImage');
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
        </script>
    @endpush
@endsection
