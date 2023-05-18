@extends('layouts.master')

@section('title','Blog Category')

@section('content')

<!-- Modal -->
<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{url('admin/delete-category')}}" method="POST">
            @csrf
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Category with its post</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="category_delete_id" id="category_id">
          <h5>Are you sure you want delete this category with its post?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Yes Delete</button>
        </div>
    </form>
      </div>
    </div>
  </div>
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
                                    {{-- <a href="{{url('admin/delete-category/'.$item->id)}}" class="btn btn-danger">Delete</a></td> --}}
                                    <button type="button" class="btn btn-danger deleteCategoryBtn" value="{{$item->id}}">Delete</button></td>
                                </tr> 
                                @endforeach
                                </tbody>   
                        </table>
                    
</div>
</div>
</div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        // $('.deleteCategoryBtn').click(function(e){
        $(document).on('click','.deleteCategoryBtn',function(e){
            e.preventDefault();

            var category_id=$(this).val();
            $('#category_id').val(category_id);
            $('#deleteModal').modal('show');
        });
    });

    </script>
@endsection