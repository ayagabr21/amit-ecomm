@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card ">
            <div class="container">
                <div class="card-header">
                    <h1 class="text-center">Products page</h1>
                </div class="table table-responsive ">
                <div class="card-body ">
                    <div class="table  table-bordered">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">price</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach ($products as $item)
                                    <tr >
                                        <th>{{ $item->id }} </th>
                                        <th>@if($item->category)
                                            {{ $item->category->name }} 
                                        @else
                                        @endif
                                        </th>
                                        <th>{{ $item->name }} </th>
                                        <th>{{ $item->price }} </th>
                                        <th>
                                            <img src="{{ URL::asset('assets/uploads/products') }}/{{ $item->image }} "
                                                height="50vh" alt="">
                                        </th>
                                        <th>
                                            <a href="{{url('edit-products',$item->id)}}" class="btn btn-success">Edit</a>
                                            <a href="{{url('delete-products',$item->id)}}"  type="button" class="btn bg-gradient-primary">Delete</a>
                                        </th>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
