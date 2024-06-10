@extends('template.app')
@section('title', 'Profile')
@section('content')
    @if (session('status'))
        <div class="mt-3">
            <div id="success-alert" class="alert alert-success d-flex justify-content-between fade show" role="alert">
                {{ session('status') }}

            </div>
        </div>
    @endif
    @push('style')
        <style>
            .avatar-responsive {
                width: 300px;
                height: 300px;

            }

            /* Media query for mobile devices */
            @media (max-width: 767px) {
                form {
                    display: flex;
                    flex-direction: column;
                }

                .avatar {
                    display: flex;
                    justify-content: center;
                }

                .avatar-responsive {

                    height: 100px;
                    width: 100px;

                    /* Adjust height for mobile view */
                }
            }
        </style>
    @endpush
    <div class="label">
        <p class="fw-bold fs-2">Profile</p>
    </div>
    <form action="{{ url('profile/' . $user->id) }}"
        method="POST"class="mt-5 conteiner-sm d-flex justify-content-around align-items-center"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div>

            <div class="avatar">
                <img src="{{ asset('uploads/' . Auth::user()->avatar) }}" id="previewImage" alt=""
                    class="ml-2 rounded-circle avatar-responsive" style=" object-fit: cover; margin-right: 10px;">
            </div>
            <input type="file" id="fileInput" class=" form-control mt-3" name="file" style="max-width: 300px">

            @error('file')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="body-form">
            <div class="row ">
                <div class="col-md-6">

                    <div class="mb-1 label">Username</div>
                    <input type="text" class=" form-control" name="username" required value="{{ $user->username }}"
                        placeholder="Masukkan Username">
                    @error('username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">

                    <div class="mb-1 label">Email</div>
                    <input type="email" class=" form-control" name="email" required value="{{ $user->email }}"
                        placeholder="Masukkan Email">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row ">
                <div class="col-md-6">
                    <div class="mb-1 mt-3 label">First Name</div>
                    <input type="text" class=" form-control" name="first_name" required value="{{ $user->first_name }}"
                        placeholder="Masukkan Nama Awal">
                    @error('first_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">

                    <div class="mb-1 mt-3 label">Last Name</div>
                    <input type="text" class=" form-control" name="last_name" value="{{ $user->last_name }}"
                        placeholder="Masukkan Nama Akhir (optional)">
                    @error('last_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="row ">
                <div class="col-md-6">
                    <div class="mb-1 mt-3 label">Address</div>
                    <textarea type="text" class=" form-control" name="alamat" placeholder="Masukkan Alamat">{{ $user->alamat }}</textarea>
                    @error('alamat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="mb-1 mt-3 label">Number</div>
                    <input type="text" class=" form-control" name="no_hp" placeholder="Masukkan No Hp"
                        value="{{ $user->no_hp }}">
                    @error('no_hp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="row ">
                <div class="col-md-6">
                    <div class="mb-1 mt-3 label">Password</div>
                    <input type="password" class=" form-control" name="password" placeholder="Masukkan Password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="mb-1 mt-3 label">Confirm Password</div>
                    <input type="password" class=" form-control" name="password_confirmation" placeholder="Ulangi Password">
                    @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            {{-- End Form  --}}
            <div class="modal-footer mt-3">
                <button type="submit" class="mr-3 btn btn-custom" name="submit">Simpan</button>
            </div>
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
                    }, 3000); // waktu dalam milidetik (5000 ms = 5 detik)
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
