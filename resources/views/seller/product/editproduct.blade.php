@extends('template.layout')
@section('title', 'Edit Product')
@section('content')
    <form action="{{ route('seller.product.list.update', $product->id) }}" method="POST" class="form"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="row ">
            <div class="col-md-6">

                <div class="mb-1 label">Name</div>
                <input type="text" class=" form-control" name="name" value="{{ $product->name }}"
                    placeholder="Masukkan Nama">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">

                <div class="mb-1 label">Price</div>
                <input type="number" class=" form-control" name="price" value="{{ $product->price }}"
                    placeholder="Masukkan Harga">
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row ">
            <div class="col-md-6">
                <div class="mb-1 mt-3 label">Category</div>
                <select type="text" class=" form-control" name="category_id" value="{{ $product->category_id }}"
                    placeholder="Masukkan Nama Awal">
                    <option value="">Pilih Kategori</option>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">

                <div class="mb-1 mt-3 label">Image</div>

                <input type="file" class=" form-control" name="file" value="{{ $product->img_path }}"
                    placeholder="Masukkan Harga">
                @error('file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
        </div>
        <div class="row ">
            <div class="col-md-6">
                <div class="mb-1 mt-3 label">Deskripsi</div>
                <textarea type="text" class=" form-control" name="description" placeholder="Masukkan Deskripsi">{{ $product->description }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">

                <div class="mb-1 mt-3 label">Stock</div>
                <input type="number" class=" form-control" name="stock" value="{{ $product->stock }}"
                    placeholder="Masukkan Stock">
                @error('stock')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="mt-5 btn btn-primary">Add Product</button>
            <a href="{{ route('seller.product.list.index') }}" type="button" class="mt-5 btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection