@extends('template.layout')
@section('title', 'Edit Category')
@section('content')
    <form action="{{ url('seller/category-list/'. $category->id) }}" method="POST" class="form">
        @method('PUT')
        @csrf
        <div class="">
            <div class="mb-1 mt-3 label">Name</div>
            <input type="text" class=" form-control" name="name" required placeholder="Masukkan Nama Kategori"
                value="{{ $category->name }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button type="submit" class="mt-3 btn btn-primary">Add Category</button>
        </div>
    </form>
@endsection
