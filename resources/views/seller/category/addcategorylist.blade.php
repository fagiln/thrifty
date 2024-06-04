@extends('template.layout')
@section('title', 'Add Category')
@section('content')
    <form  method="POST" class="form">
@csrf
        <div class="">
            <div class="mb-1 mt-3 label">Name</div>
            <input type="text" class=" form-control" name="name" required placeholder="Masukkan Nama Kategori">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button type="submit" class="mt-3 btn btn-primary">Add Category</button>
        </div>
    </form>
@endsection
