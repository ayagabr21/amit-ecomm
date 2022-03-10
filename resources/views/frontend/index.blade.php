@extends('layouts.front')
@section('title')
    welcome to E-shop
@endsection
@section('content')
    @include('layouts.inc.slider')
    <div class="py-5">
        <div class="container ">
            <div class="row">
                <div class="card mt-5 mb-5 p-3  border border-2">
                    <h3 class="text-center ">Trending Products</h3>
                </div>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($featured_products as $prod)
                    <div class="item">
                        <div class="card ">
                            <div class="card-body">
                                <a href="{{url('category/'. $prod->category->slug.'/'.$prod->slug)}} ">
                                    <img src="{{ URL::asset('assets/uploads/products') }}/{{ $prod->image }}"
                                        class="card-img-top" alt="...">
                                    <p class="card-text">{{ $prod->name }} </p>
                                    <small>{{ $prod->price }} </small>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                        
                           


                        
                </div>

            </div>
        </div>
    </div>
    </div>


    <div class="py-5">
        <div class="container ">
            <div class="row">
                <div class="card mt-5 mb-5 p-3  border border-2">
                    <h3 class="text-center ">Trending Categories</h3>
                </div>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($featured_category as $tcate)
                    <div class="item">
                        <a href="{{ url('view-category/'.$tcate->slug) }}">
                        <div class="card ">
                            <div class="card-body">
                                <img src="{{ URL::asset('assets/uploads/category') }}/{{ $tcate->image }}"
                                    class="card-img-top" alt="...">
                                <p class="card-text">{{ $tcate->name }} </p>
                            </div>
                        </div>
                    </a>
                    </div>
                    @endforeach
                        
                           


                        
                </div>

            </div>
        </div>
    </div

@endsection
@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop: true,
            margin: 50,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
@endsection
