@extends('layouts.master')

@section('title','Blog Category')

@section('content')
<div class="container-fluid px-4">
<div class="card mt-4">
    <div class="card-header">
    <h4>View Category<a href="{{url('admin/add-category')}}" class="btn btn-primary btn-sm float-end">Add Category</a></h4>
</div>
<div class="card-body">

</div>
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
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td><img src="{{asset('img/'.$item->image)}}" alt="Not Found Image" width="50px" height="50px"></td>
                                    <td>{{$item->status=='1' ? 'Inactive':'Active'}}</td>
                                    <td><a href="" class="btn btn-success">Edit</a></td>
                                </tr> 
                                @endforeach
                                </tbody>   
                        </table>
                    
</div>
</div>
</div>
</div>
@endsection