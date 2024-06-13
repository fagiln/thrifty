@extends('template.app')
@section('title', 'Home')
@section('content')
    @push('style')
        <style>
            .responsive-img {
                width: 100%;
                height: 400px;
                object-fit: cover;
            }

            /* Media query for mobile devices */
            @media (max-width: 767px) {

                .responsive-img {
                    height: 200px;
                    /* Adjust height for mobile view */
                }
            }
        </style>
    @endpush
    <div class="slider">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($slider as $index => $item)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}"
                        class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($slider as $index => $item)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ asset('uploads/' . $item->image_path) }}" class="responsive-img d-block w-100"
                            alt="{{ $item->title }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $item->title }}</h5>
                            <p>{{ $item->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="product container-xxl">
        <div class="label my-4 d-flex justify-content-between">
            <div>

                <p class="fs-4 fw-bold">Our Product</p>
            </div>

            <form class="d-flex" action="{{ route('home.index') }}" method="GET">
                @csrf
                <input class="form-control me-2" name="search" type="search" placeholder="Cari barang"
                    aria-label="Search">

                <button class="btn btn-outline-primary" type="submit">Search</button>

            </form>


        </div>


        <div class="row ">

            @foreach ($product as $item)
                @if ($item->stock != '0')
                    <div class="col-lg-3 col-md-6 d-flex justify-content-center">
                        <div class="card mb-3" style="width: 18rem; ">
                            <img src="{{ asset('uploads/' . $item->img_path) }}"
                                class="card-img-top"style="height:200px; width:100%; object-fit:cover;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                {{-- <p class="card-text fw-lighter">{{ Str::limit($item->description, '50', '..') }}</p> --}}
                                <p class="card-text fw-lighter fst-italic">Stock : {{ $item->stock }}</p>
                                <p class="card-text fw-bolder">Rp. {{ $item->price }}</p>
                                <div class="d-flex justify-content-between align-items-cemter">
                                    @auth
                                        <a href="{{ route('product.buy', $item->id) }}" class="btn btn-custom"><i
                                                class="fas fa-cart-plus"></i> Buy</a>
                                    @endauth
                                    @guest
                                        <a href="/login" class="btn btn-custom"><i class="fas fa-cart-plus"></i> Buy</a>
                                    @endguest
                                    <a class="text-muted" href="{{ url('detail-product/' . $item->id) }}">See details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>



    </div>
    @push('scripts')
        {{-- <script>
            var myCarousel = document.querySelector('#myCarousel')
            var carousel = new bootstrap.Carousel(myCarousel)
        </script> --}}
    @endpush
@endsection
