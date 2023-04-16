@extends('layouts.master')

@section('title','Blog Category')

@section('content')
<div class="container-fluid px-4">
<div class="card mt-4">
    <div class="card-header">
        <h1 class="">Add Category</h1>
</div>
<div class="card-body">
    <!-- To Show all errors in form -->
    @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <div>{{$error}}</div>
        @endforeach
        </div>
    @endif
    
<form action="{{url('admin/add-category')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group mb-3">
    <label for="">Category Name</label>
    <input type="text" name="name" class="form-control" value="{{old('name')}}">
    <span class="text-danger">@error('name'){{$message}}@enderror</span>
</div>

<div class="form-group mb-3">
    <label for="">Slug</label>
    <input type="text" name="slug" class="form-control" value="{{old('slug')}}">
    <span class="text-danger">@error('slug'){{$message}}@enderror</span>
</div>

<div class="form-group mb-3">
    <label for="">Description</label>
    <textarea name="description" rows="3" class="form-control">{{old('description')}}</textarea>
    <span class="text-danger">@error('description'){{$message}}@enderror</span>
</div>

<div class="form-group mb-3">
    <label for="">Image</label>
    <input type="file" name="image" class="form-control" value="{{old('image')}}">
    <span class="text-danger">@error('image'){{$message}}@enderror</span>
</div>

<h6>SEO Tags</h6>
<div class="form-group mb-3">
    <label for="">Meta Title</label>
    <input type="text" name="meta_title" class="form-control" value="{{old('meta_title')}}">
    <span class="text-danger">@error('meta_title'){{$message}}@enderror</span>
</div>

<div class="form-group mb-3">
    <label for="">Meta Description</label>
    <textarea name="meta_description" rows="3" class="form-control">{{old('meta_description')}}</textarea>
    <span class="text-danger">@error('meta_description'){{$message}}@enderror</span>
</div>

<div class="form-group mb-3">
    <label for="">Meta Keyword</label>
    <textarea name="meta_keyword" rows="3" class="form-control">{{old('meta_keyword')}}</textarea>
    <span class="text-danger">@error('meta_keyword'){{$message}}@enderror</span>
</div>

<h6>Status Mode</h6>
<div class="row">
<div class="col-md-6 mb-3">
    <label for="">Navbar Status</label>
    <input type="checkbox" name="navbar_status" value="{{old('navbar_status')}}">
    <span class="text-danger">@error('navbar_status'){{$message}}@enderror</span>
</div>

<div class="col-md-6 mb-3">
    <label for="">Status</label>
    <input type="checkbox" name="status" value="{{old('status')}}">
    <span class="text-danger">@error('status'){{$message}}@enderror</span>
</div>
<div class="col-md-6">
    <button type="submit" class="btn btn-primary">Save Category</button>
</div>
</div>
</form>
</div>
</div>
</div>
@endsection