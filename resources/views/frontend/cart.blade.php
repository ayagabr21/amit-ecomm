@extends('layouts.front')
@section('title')
    My Cart
@endsection
@section('content')
    <div class="py-3 bg-bold mb-4 shadow-sm bg-warning border-top">
        <div class="container">

        </div>
    </div>

    <div class="container my-5 mt-5">
        <div class="card shadow product_data">
            <div class="card-body">
                @foreach ($cartItem as $item)
                    <div class="row">
                        <div class="col-md-3 m-3">
                            <img src="{{ URL::asset('assets/uploads/products') }}/{{ $item->products->image }}"
                                height="70px" ! width="70px" alt="" class="w-100">

                        </div>
                        <div class="col-md-2 me-5 my-5 m-3">
                            <h5>{{ $item->products->name }} </h5>

                        </div>
                        <div class="col-md-2 m-4">
                            <input type="hidden" value="{{ $item->prod_id }} " class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn ">-</button>
                                <input type="text" name="quantity " value="{{ $item->prod_qty }} "
                                    class="form-control text-center qty-input">
                                <button class="input-group-text increment-btn ">+</button>

                            </div>
                        </div>
                        <div class="col-md-2 m-5">
                            <button class="btn btn-danger delete-cartItem"> <i class="fa fa-trash"></i> Remove </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
