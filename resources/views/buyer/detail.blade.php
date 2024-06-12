@extends('template.app')
@section('title', 'Detail Product')
@section('content')
    @push('style')
        <style>
            .image {
                height: auto;
                width: 500px;
                object-fit: cover;
            }
        </style>
    @endpush
    <div class="label">
        <p class="fw-bold fs-2">Detail Product</p>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <img src="{{ asset('uploads/' . $product->img_path) }}" alt="" srcset="" class="image col-md-6 mb-3">
            <div class="description col-md-6 d-flex flex-column">
                <p>Merk : {{ $product->name }}</p>
                <p>Category : {{ $product->category->name }}</p>
                <p>Stock : {{ $product->stock }}</p>
                <p>Description :</p>
                <p style="   text-align: justify;">{{ $product->description }}</p>
                <div class="mt-3">
                    <div class="d-flex bd-highlight mb-3 align-items-center">
                        <div class="me-auto p-2 bd-highlight"></div>
                        <div class="p-2 bd-highlight fw-bold">Rp. {{ $product->price }}</div>
                        <div class="p-2 bd-highlight">
                            @auth
                                <a href="" class="btn btn-custom"><i class="fas fa-cart-plus"></i> Add to Cart</a>
                            @endauth
                            @guest
                                <a href="/login" class="btn btn-custom"><i class="fas fa-cart-plus"></i> Add to Cart</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
