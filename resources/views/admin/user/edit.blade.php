@extends('layouts.master')

@section('title','Edit User')

@section('content')
<div class="container-fluid px-4">
<div class="card mt-4 mb-4">
    <div class="card-header">
        <h4 class="">Edit User <a href="{{url('admin/users')}}" class="btn btn-primary float-end">BACK</a></h4>
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
    
<div class="form-group mb-3">
    <label for="">Full Name</label>
    <input type="text" name="name" class="form-control" value="{{$user->name}}">
    <span class="text-danger">@error('name'){{$message}}@enderror</span>
</div>

<div class="form-group mb-3">
    <label for="">Email Id</label>
    <input type="text" name="email" class="form-control" value="{{$user->email}}">
    <span class="text-danger">@error('email'){{$message}}@enderror</span>
</div>

<div class="form-group mb-3">
    <label for="">Created At</label>
    <input type="text" name="created_at" class="form-control" value="{{$user->created_at->format('d/m/y')}}">
    <span class="text-danger">@error('created_at'){{$message}}@enderror</span>
</div>

<form action="{{url('admin/update-user/'.$user->id)}}" method="POST">
@csrf
@method('PUT')
<div class="form-group mb-3">
    <label for="">Role As</label>
    <select name="role_as" class="form-control">
        <option value="1" {{$user->role_as=='1' ? 'selected':''}}>Admin</option>
        <option value="0" {{$user->role_as=='0' ? 'selected':''}}>User</option>
        <option value="2" {{$user->role_as=='2' ? 'selected':''}}>Blogger</option>
    </select>
    <span class="text-danger">@error('created_at'){{$message}}@enderror</span>
</div>

<div class="col-md-6">
    <button type="submit" class="btn btn-primary">Update User</button>
</div>
</div>
</form>
</div>
</div>
</div>
@endsection