<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts=Post::all();
        return view('admin.post.index',['posts'=>$posts]);
    }

    public function create(){
        $category=Category::where('status','0')->get();
        return view('admin.post.create',compact('category'));
    }

    public function store(Request $request){
        $request->validate([
            'category_id'=>'required',
            'name'=>'required|string|max:200',
            'slug'=>'required|string|max:200',
            'description'=>'required',
            'yt_iframe'=>'nullable|string',
            'meta_title'=>'required|string|max:200',
            'meta_description'=>'nullable|string',
            'meta_keyword'=>'nullable|string',
            'status'=>'nullable|boolean'
        ],
    [
        'name.required'=>"Username is required",
    ]);

       $post=new Post;
       $post->category_id=$request->category_id;
       $post->name=$request->name;
       $post->slug=$request->slug;
       $post->description=$request->description;
       $post->yt_iframe=$request->yt_iframe;
       $post->meta_title=$request->meta_title;
       $post->meta_description=$request->meta_description;
       $post->meta_keyword=$request->meta_keyword;
       $post->status=$request->status==true ? '1':'0';
       $post->created_by=Auth::user()->id;
       $post->save();
       if($post){
        return redirect('admin/posts')->with('success','You have added post successfully!');
    }
    else{
        return back()->with('fail','Something Went Wrong!');
    }
}

public function edit($id){
    $category=Category::where('status','0')->get();
    $edit=Post::find($id);
    return view('admin.post.edit',compact('edit','category'));
}


public function update(Request $request, $id){
    $request->validate([
        'category_id'=>'required',
        'name'=>'required|string|max:200',
        'slug'=>'required|string|max:200',
        'description'=>'required',
        'yt_iframe'=>'nullable|string',
        'meta_title'=>'required|string|max:200',
        'meta_description'=>'nullable|string',
        'meta_keyword'=>'nullable|string',
        'status'=>'nullable|boolean'
    ],
[
    'name.required'=>"Username is required",
]);

   $post=Post::find($id);
   $post->category_id=$request->category_id;
   $post->name=$request->name;
   $post->slug=$request->slug;
   $post->description=$request->description;
   $post->yt_iframe=$request->yt_iframe;
   $post->meta_title=$request->meta_title;
   $post->meta_description=$request->meta_description;
   $post->meta_keyword=$request->meta_keyword;
   $post->status=$request->status==true ? '1':'0';
   $post->created_by=Auth::user()->id;
   $post->update();
   if($post){
    return redirect('admin/posts')->with('success','You have Updated post successfully!');
}
else{
    return back()->with('fail','Something Went Wrong!');
}
}

public function delete($id){
    $post=Post::find($id);
    $post->delete();
    if($post){
        return redirect('admin/posts')->with('success','You have Deleted post successfully!');
    }
    else{
        return back()->with('fail','Something Went Wrong!');
    }

}
}
