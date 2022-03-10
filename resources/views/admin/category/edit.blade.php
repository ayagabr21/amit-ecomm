@extends('layouts.admin')
@section('content')
    <div class="container p-5 ">
        <div class="card g-3 p-3">
            <div class="card-header">
                <h3 class="text-center">Edit category</h3>
            </div>
            {{-- <form action="{{route('update-category'.$category->id)}}" method="post" enctype="multipart/form-data"> --}}

            <form action="{{url('update-category',$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-5">
                    <div class="col-md-6">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control @error('title', 'post') is-invalid @enderror" value="{{ $category->name }} " name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">slug</label>
                        <input type="text" class="form-control @error('title', 'post') is-invalid @enderror" value="{{ $category->slug }} " name="slug">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control @error('title', 'post') is-invalid @enderror" name="description">{{ $category->description }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input @error('title', 'post') is-invalid @enderror" type="checkbox" name="status"
                                value="{{ $category->status == '1' ? 'checked' : '' }} ">
                            <label class="form-check-label" for="gridCheck">
                                status
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input @error('title', 'post') is-invalid @enderror" type="checkbox" name="popular"
                                value="{{ $category->popular == '1' ? 'checked' : '' }} ">
                            <label class="form-check-label" for="gridCheck">
                                popular
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label @error('title', 'post') is-invalid @enderror">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{ $category->meta_title }} ">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Meta keywords</label>
                        <input type="text" class="form-control @error('title', 'post') is-invalid @enderror" name="meta_keywords"
                            value="{{ $category->meta_keywords }} ">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Meta Description</label>
                        <input type="text" class="form-control @error('title', 'post') is-invalid @enderror" name="meta_description"
                            value="{{ $category->meta_title }} ">
                    </div>

                    @if ($category->image)
                        <img src="{{ URL::asset('assets/uploads/category') }}/{{ $category->image }} " height="50vh"
                            alt="">
                    @endif

                    <div class="col-12">
                        <input type="file" class="form-control @error('title', 'post') is-invalid @enderror" name="image" >
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn bg-gradient-primary">update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
