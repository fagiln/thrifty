@extends('template.layout')
@section('title', 'Add Seller')
@section('content')
    <form action="" method="POST" class="form">
        @csrf
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
                <input type="password" class=" form-control" name="password_confirmation" required placeholder="Ulangi Password">
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
        
            </div>
        </div>
       

     

   
        <div>
            <button type="submit" class="mt-3 btn btn-primary">Add</button>
        </div>
    </form>
@endsection
