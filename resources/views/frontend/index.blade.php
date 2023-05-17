@extends('layouts.app')
@section('title',"My Blogging Website")
@section('meta_description',"My Blogging Website")
@section('meta_keyword',"My Blogging Website")
@section('content')

<div class="bg-danger py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="owl-carousel category-carousel owl-theme">
                @foreach($all_categories as $all_cate_item)
                <div class="item">
                    <a href="{{url('tutorial/'.$all_cate_item->slug)}}" class="text-decoration-none">
                    <div class="card">
                    <img src="{{asset('img/'.$all_cate_item->image)}}" alt="Not Found Image">
                        <div class="card-body text-center">
                            <h4 class="text-dark">{{$all_cate_item->name}}</h4>
</div>
</div>
</a>
</div>
@endforeach

</div>
</div>
</div>
</div>


</div>
</div>
</div>
<div>
@endsection