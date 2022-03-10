@extends('layouts.front')
@section('title')
    Category
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="card mt-5 border border-5">
                        <h3 class="text-center ">All Categories</h3>
                    </div>
                    @foreach ($category as $cate)
                        <div class="col-md-4 mb-4 mt-4">
                            <a href="{{ url('view-category/'.$cate->slug) }} ">
                                <div class="card ">
                                    <div class="card-body">
                                        <img src="{{ URL::asset('assets/uploads/category') }}/{{ $cate->image }}"
                                            class="card-img-top" alt="...">
                                        <p class="card-text">{{ $cate->name }} </p>
                                        <p>{{ $cate->description }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
