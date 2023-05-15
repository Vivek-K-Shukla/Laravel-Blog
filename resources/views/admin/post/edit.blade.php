@extends('layouts.master')

@section('title','Blog Post')

@section('content')
<div class="container-fluid px-4">
<div class="card mt-4 mb-4">
    <div class="card-header">
        <h4 class="">Edit Post <a href="{{url('admin/add-posts')}}" class="btn btn-primary float-end">BACK</a></h4>
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
    
<form action="{{url('admin/update-post/'.$edit->id)}}" method="POST">
@csrf
@method('PUT')
<div class="form-group mb-3">
    <label for="">Category</label>
    <select name="category_id" class="form-control" required>
        <option value="">---Select Category---</option>
        @foreach($category as $cateitem)
        <option value="{{$cateitem->id}}" {{$edit->category_id==$cateitem->id ? 'selected':''}}>{{$cateitem->name}}</option>
        @endforeach
    </select>
    <span class="text-danger">@error('name'){{$message}}@enderror</span>
</div>

<div class="form-group mb-3">
    <label for="">Post Name</label>
    <input type="text" name="name" class="form-control" value="{{$edit->name}}">
    <span class="text-danger">@error('name'){{$message}}@enderror</span>
</div>

<div class="form-group mb-3">
    <label for="">Slug</label>
    <input type="text" name="slug" class="form-control" value="{{$edit->slug}}">
    <span class="text-danger">@error('slug'){{$message}}@enderror</span>
</div>

<div class="form-group mb-3">
    <label for="">Description</label>
    <textarea name="description" class="mysummernote" rows="3" class="form-control">{!! $edit->description !!}</textarea>
    <span class="text-danger">@error('description'){{$message}}@enderror</span>
</div>

<div class="form-group mb-3">
    <label for="">YouTube Iframe Link</label>
    <input type="text" name="yt_iframe" class="form-control" value="{{$edit->yt_iframe}}">
    <span class="text-danger">@error('yt_iframe'){{$message}}@enderror</span>
</div>

<h6>SEO Tags</h6>
<div class="form-group mb-3">
    <label for="">Meta Title</label>
    <input type="text" name="meta_title" class="form-control" value="{{$edit->meta_title}}">
    <span class="text-danger">@error('meta_title'){{$message}}@enderror</span>
</div>

<div class="form-group mb-3">
    <label for="">Meta Description</label>
    <textarea name="meta_description" class="mysummernote" rows="3" class="form-control">{!! $edit->meta_description !!}</textarea>
    <span class="text-danger">@error('meta_description'){{$message}}@enderror</span>
</div>

<div class="form-group mb-3">
    <label for="">Meta Keyword</label>
    <textarea name="meta_keyword" class="mysummernote" rows="3" class="form-control">{!! $edit->meta_keyword !!}</textarea>
    <span class="text-danger">@error('meta_keyword'){{$message}}@enderror</span>
</div>

<h6>Status Mode</h6>
<div class="row">
<div class="col-md-6 mb-3">
    <label for="">Status</label>
    <input type="checkbox" name="status" value="{{$edit->status}}">
    <span class="text-danger">@error('status'){{$message}}@enderror</span>
</div>

<div class="col-md-6">
    <button type="submit" class="btn btn-primary">Save Post</button>
</div>
</div>
</form>
</div>
</div>
</div>
@endsection