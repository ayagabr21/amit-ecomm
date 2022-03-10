@extends('layouts.admin')
@section('content')
<div class="container p-5 ">
  <div class="card g-3 p-3">
<div class="card-header">
  <h3 class="text-center">Add category</h3>
</div>
    {{-- <form action="{{route('insert-categories')}}" method="post" enctype="multipart/form-data"> --}}

  <form action="{{url('/insert-categories')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="row g-5">
    <div class="col-md-6">
      <label for="" class="form-label">Name</label>
      <input type="text" class="form-control" name="name">
    </div>
    <div class="col-md-6">
      <label for="" class="form-label">slug</label>
      <input type="text" class="form-control" name="slug">
    </div>
    <div class="col-12">
      <label for="" class="form-label">Description</label>
      <input type="text" class="form-control"  name="description">
    </div>
    <div class="col-md-6">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="status">
            <label class="form-check-label" for="gridCheck">
                status
            </label>
          </div>
    </div>
    <div class="col-md-6">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="popular">
            <label class="form-check-label" for="gridCheck">
             popular
            </label>
          </div>
    </div>
    <div class="col-12">
        <label for="" class="form-label">Meta Title</label>
        <input type="text" class="form-control"  name="meta_title">
      </div>
      <div class="col-12">
        <label for="" class="form-label">Meta keywords</label>
        <input type="text" class="form-control  @error('title', 'post') is-invalid @enderror"  name="meta_keywords">
      </div>
      <div class="col-12">
        <label for="" class="form-label">Meta Description</label>
        <input type="text" class="form-control  @error('title', 'post') is-invalid @enderror"  name="meta_description">
      </div>
      <div class="col-12">
        <input type="file" class="form-control  @error('title', 'post') is-invalid @enderror"  name="image">
      </div>


    <div class="col-12">
      <button type="submit" class="btn ">Submit</button>
    </div>
  </div>
</form>
</div>
</div>
@endsection