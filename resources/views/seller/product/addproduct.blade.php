@extends('template.layout')
@section('title', 'Add Product')
@section('content')


    <form action="{{ route('seller.product.list.store') }}" method="POST" class="form" enctype="multipart/form-data">
        @csrf
        <div class="row ">
            <div class="col-md-6">

                <div class="mb-1 label">Name</div>
                <input type="text" class=" form-control" name="name" required value="{{ old('name') }}"
                    placeholder="Masukkan Nama">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">

                <div class="mb-1 label">Price</div>
                <input type="number" class=" form-control" name="price" required value="{{ old('price') }}"
                    placeholder="Masukkan Harga">
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row ">
            <div class="col-md-6">
                <div class="mb-1 mt-3 label">Category</div>
                <select type="text" class=" form-control" name="category_id" required value="{{ old('category_id') }}"
                    placeholder="Masukkan Nama Awal">
                    <option value="">Pilih Kategori</option>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">

                <div class="mb-1 mt-3 label">Image</div>

                <input type="file" class=" form-control" name="file" required value="{{ old('price') }}"
                    placeholder="Masukkan Harga">
                @error('file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
        </div>
        <div class="row ">
            <div class="col-md-6">
                <div class="mb-1 mt-3 label">Deskripsi</div>
                <textarea type="text" class=" form-control" name="description" required placeholder="Masukkan Deskripsi"></textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">

                <div class="mb-1 mt-3 label">Stock</div>
                <input type="number" class=" form-control" name="stock" required value="{{ old('stock') }}"
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
        </script>
    @endpush
@endsection