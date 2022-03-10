@extends('layouts.admin')
@section('content')
    <div class="container p-5 ">
        <div class="card g-3 p-3">
            <div class="card-header">
                <h3 class="text-center">edit Products</h3>
            </div>
            {{-- <form action="{{route('insert-categories')}}" method="post" enctype="multipart/form-data"> --}}

            <form action="{{ url('update-products',$products->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-5">
                    <div class="col-md- m-4 p-5 ">
                        <select class="form-select g-4 text-center" name="category_id">
                            <option value="{{$products->category->id}}">{{ $products->category->name }}</option>


                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">name</label>
                        <input type="text" class="form-control" value="{{ $products->name }} " name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">slug</label>
                        <input type="text" class="form-control" value="{{ $products->slug }} " name="slug">
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Description</label>
                        <input type="text" class="form-control" value="{{ $products->decription }} " name="description">
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Small Description</label>
                        <input type="text" class="form-control" value="{{ $products->small_description }} "
                            name="small_description">
                    </div>

                    <div class="col-6">
                        <label for="" class="form-label">price</label>
                        <input type="number" class="form-control" value="{{ $products->price }}" name="price">
                    </div>

                    <div class="col-6">
                        <label for="" class="form-label">quantity</label>
                        <input type="number" class="form-control" value="{{ $products->qty }} " name="qty">
                    </div>



                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="status" value="{{ $products->status == '1' ? 'checked' : '' }} ">
                            <label class="form-check-label"   for="gridCheck">
                                status
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="trending" value="{{ $products->trending == '1' ? 'checked' : '' }} ">
                            <label class="form-check-label" for="gridCheck">
                                Trending
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title"value="{{ $products->meta_title }} ">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Meta keywords</label>
                        <input type="text" class="form-control" name="meta_keywords" value="{{ $products->meta_keywords }} ">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Meta Description</label>
                        <input type="text" class="form-control" name="meta_description"  value="{{ $products->meta_description }} ">
                    </div>
                    @if ($products->image)
                    <img src="{{ URL::asset('assets/uploads/products') }}/{{ $products->image }} " height="50vh"
                        alt="">
                @endif
                    <div class="col-12">
                        <input type="file" class="form-control" name="image">
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn bg-gradient-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
