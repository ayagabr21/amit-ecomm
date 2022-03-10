@extends('layouts.front')
@section('title')
{{$category->name}}
@endsection
@section('content')

<div class="py-3 bg-bold mb-4 shadow-sm bg-warning border-top">
    <div class="container">
    
        <h4>  Collections / {{$category->name}}</h4>
    </div>
    </div>
    <div class="py-5">
        <div class="container ">
            <div class="row">
                <div class="card mt-5 mb-5 p-3  border border-2">
                    <h3 class="text-center ">{{$category->name}} </h3>
                </div>
                    @foreach ($products as $prod)
                    <div class="col-md-3">
                        <div class="card ">
                            <div class="card-body m-2">
                                <a href="{{url('category/'.$category->slug.'/'.$prod->slug)}} ">
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
@endsection
