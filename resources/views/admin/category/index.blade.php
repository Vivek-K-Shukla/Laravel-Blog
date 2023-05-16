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

                    <table id="myDataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Meta Keyword</th>
                                <th>Status</th>
                                <th>Action(s)</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{!! $item->description !!}</td>
                                    <td><img src="{{asset('img/'.$item->image)}}" alt="Not Found Image" width="70px" height="70px"></td>
                                    <td>{!! $item->meta_keyword !!}</td>
                                    <td>{{$item->status=='1' ? 'Inactive':'Active'}}</td>
                                    <td><a href="{{url('admin/edit-category/'.$item->id)}}" class="btn btn-success">Edit</a>
                                    <a href="{{url('admin/delete-category/'.$item->id)}}" class="btn btn-danger">Delete</a></td>
                                </tr> 
                                @endforeach
                                </tbody>   
                        </table>
                    
</div>
</div>
</div>
</div>
@endsection