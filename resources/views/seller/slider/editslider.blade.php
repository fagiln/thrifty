@extends('template.layout')
@section('title', 'Edit Slider')
@section('content')


    <form action="{{ route('seller.slider.list.update', $slider->id) }}" method="POST" class="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
      
        <div class="row ">
            <div class="col-md-6">
                <div class="mb-1 mt-3 label">Title</div>
                <input type="text" class=" form-control" name="title" required value="{{ $slider->title }}"
                    placeholder="Masukkan Nama Awal">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="mb-1 mt-3 label">Image</div>
                <input type="file" id="fileInput" class=" form-control" name="file" >
               <div class="d-flex mt-2">
                <div class="label mr-3">Preview :</div>
                <img id="previewImage" src="#" alt="Preview Gambar" style="display: none; margin-top: 10px; max-width: 200px;">
            </div>
                @error('file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
        </div>
        <div class="row ">
            <div class="col-md-6">
                <div class="mb-1 mt-3 label">Deskripsi</div>
                <textarea type="text" class=" form-control" name="description" required placeholder="Masukkan Deskripsi">{{$slider->description}}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
         
            <div class="col-md-6">
                <button type="submit" class="mt-5 btn btn-primary">Edit Slider</button>
                <a href="{{ route('seller.slider.list.index') }}" type="button" class="mt-5 btn btn-secondary">Cancel</a>
            </div>
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
