@extends('layouts.master')

@section('title','View Users')

@section('content')
<div class="container-fluid px-4">
<div class="card mt-4">
    <div class="card-header">
    <h4>View Users</h4>
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
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->role_as=='1' ? 'Admin':'User'}}</td>
                                    <td><a href="{{url('admin/edit-user/'.$item->id)}}" class="btn btn-success">Edit</a>
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