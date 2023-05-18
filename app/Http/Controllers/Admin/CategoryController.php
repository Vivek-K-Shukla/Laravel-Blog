<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $category=category::all();
        return view('admin.category.index',compact('category'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:200',
            'slug'=>'required|string|max:200',
            'description'=>'required',
            'image'=>'mimes:jpeg,jpg,png,gif,svg|required|max:2048',
            'meta_title'=>'required|string|max:200',
            'meta_description'=>'required|string',
            'meta_keyword'=>'required|string',
            'navbar_status'=>'nullable|boolean',
            'status'=>'nullable|boolean'
        ],
    [
        'name.required'=>"Username is required",
        'image.required'=>"Image field only accepts jpeg, jpg, png type only",
        'meta_title.required'=>"Meta title must not be grater than 200 characters",
        'meta_status.required'=>"Meta Status is required",
        'status.required'=>"Status fiels is mendatory"
    ]);

       $category=new Category;
       $category->name=$request->name;
       $category->slug = Str::slug($request->slug);
       $category->description=$request->description;
      //Adding an Image:
      if($request->hasfile('image')){
        $file=$request->file('image');
        $extenstion=$file->getClientOriginalExtension();
        $filename=time().'.'.$extenstion;
        $file->move('img/',$filename);
        $category->image=$filename;   
        }
       $category->meta_title=$request->meta_title;
       $category->meta_description=$request->meta_description;
       $category->meta_keyword=$request->meta_keyword;
       $category->navbar_status=$request->navbar_status==true ? '1':'0';
       $category->status=$request->status==true ? '1':'0';
       $category->created_by=Auth::user()->id;
       $category->save();
       if($category){
        return redirect('admin/category')->with('success','You have added category successfully!');
    }
    else{
        return back()->with('fail','Something Went Wrong!');
    }  
    }

    public function edit($id){
        $edit=Category::find($id);
        return view('admin.category.edit',compact('edit'));
    }

    public function update(Request $request){
        $update=Category::find($request->id);
        $update->name=$request->name;
        $update->slug = Str::slug($request->slug);
        $update->description=$request->description;
        //Updating File/Image:
        if($request->hasfile('image')){
            $destination='img/'.$update->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file=$request->file('image');
            $extenstion=$file->getClientOriginalExtension();
            $filename=time().'.'.$extenstion;
            $file->move('img/',$filename);
            $update->image=$filename;
        }
        $update->meta_title=$request->meta_title;
        $update->meta_description=$request->meta_description;
        $update->meta_keyword=$request->meta_keyword;
        $update->navbar_status=$request->navbar_status==true ? '1':'0';
        $update->status=$request->status==true ? '1':'0';
        $update->created_by=Auth::user()->id;
        $update->save();
        if($update){
         return redirect('admin/category')->with('success','You have updated category successfully!');
     }
     else{
         return back()->with('fail','Something Went Wrong!');
     } 
    }


    public function delete(Request $request){
        $category=Category::find($request->category_delete_id);
        if($category){
            $destination='img/'.$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $category->posts()->delete();
            $category->delete();
            return redirect('admin/category')->with('success','You have deleted category with its post successfully!');
        }
        else{
            return back()->with('fail','Something Went Wrong!');
        } 
    }
}
