@extends('template.app')
@section('title', 'Home')
@section('content')
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
                        <img src="{{ asset('uploads/' . $item->image_path) }}" class="d-block w-100"
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
        <div class="label my-4">
            <h2>Our Product</h2>
        </div>


        <div class="row">

            @foreach ($product as $item)
                <div class="col-md-3">
                    <div class="card  " style="width: 18rem; ">
                        <img src="{{ asset('uploads/' . $item->img_path) }}"
                            class="card-img-top"style="height:200px; width:100%; object-fit:cover;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <p class="card-text">Rp. {{ $item->price }}</p>
                            <div class="d-flex justify-content-between">
                                @auth

                                    <a href="#" class="btn btn-custom">Buy</a>
                                    <a href="">See details</a>
                                @endauth
                                @guest
                                    <a href="/login" class="btn btn-custom">Buy</a>
                                    <a href="">See details</a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
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
