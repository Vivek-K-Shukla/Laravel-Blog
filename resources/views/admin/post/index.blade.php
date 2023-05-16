@extends('layouts.master')

@section('title','Blog Post')

@section('content')
<div class="container-fluid px-4">
<div class="card mt-4">
    <div class="card-header">
    <h4>View Post<a href="{{url('admin/add-posts')}}" class="btn btn-primary btn-sm float-end">Add Post</a></h4>
</div>
<div class="card-body">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Post Name</th>
                                <th>Status</th>
                                <th>Action(s)</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->category->name}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->status=='1' ? 'Inactive':'Active'}}</td>
                                    <td><a href="{{url('admin/edit-post/'.$item->id)}}" class="btn btn-success">Edit</a>
                                    <a href="{{url('admin/delete-post/'.$item->id)}}" class="btn btn-danger">Delete</a></td>
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