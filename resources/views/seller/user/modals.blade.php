 {{-- Create Data Modal --}}

 @extends('template.layout')
 @section('title', 'Edit User')
 @section('content')
 <form action="{{url('seller/user-list/'.$user->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
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
            <input type="text" class=" form-control" name="username" required value="{{$user->username}}"
                placeholder="Masukkan Username">
            @error('username')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">

            <div class="mb-1 label">Email</div>
            <input type="email" class=" form-control" name="email" required value="{{$user->email}}"
                placeholder="Masukkan Email">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row ">
        <div class="col-md-6">
            <div class="mb-1 mt-3 label">First Name</div>
            <input type="text" class=" form-control" name="first_name" required value="{{$user->first_name}}"
                placeholder="Masukkan Nama Awal">
            @error('first_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">

            <div class="mb-1 mt-3 label">Last Name</div>
            <input type="text" class=" form-control" name="last_name" value="{{$user->last_name}}"
                placeholder="Masukkan Nama Akhir (optional)">
            @error('last_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
    </div>
    <div class="row ">
        <div class="col-md-6">
            <div class="mb-1 mt-3 label">Address</div>
            <textarea type="text" class=" form-control" name="alamat" placeholder="Masukkan Alamat">{{$user->alamat}}</textarea>
            @error('alamat')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <div class="mb-1 mt-3 label">Number</div>
            <input type="text" class=" form-control" name="no_hp" placeholder="Masukkan No Hp" value="{{$user->no_hp}}">
            @error('no_hp')
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
         {{-- End Form  --}}
     <div class="modal-footer">
         <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
         <a type="button" class="btn btn-secondary" href="{{url('seller/user-list')}}">Tutup</a>
     </div>
 </form>

 @push('scripts')
     <script>
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