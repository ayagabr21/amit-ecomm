@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card p-3 m-5">
            <div class="container">
                <div class="card-header">
                    <h1 class="text-center">Category page</h1>
                </div class="table table-responsive ">
                <div class="card-body ">
                    <div class="table  table-bordered">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                    <tr>
                                        <td>{{ $item->id }} </td>
                                        <td scope="row">{{ $item->name }} </td>
                                        <td scope="row">{{ $item->description }} </td>
                                        <td>
                                            <img src="{{ URL::asset('assets/uploads/category') }}/{{ $item->image }} "
                                                height="50vh" alt="">
                                        </td>
                                        <td>
                                            <a href="{{url('edit-product',$item->id)}}" class="btn btn-success">Edit</a>
                                            <a href="{{url('delete-category',$item->id)}}"  type="button" class="btn bg-gradient-primary">Delete</a>
                                        </td>

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
