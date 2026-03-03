<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Department;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Department $department)
    {
        $success=session('success');
        $error=session('error');
        $blogs = $department->blogs()->get();   
        
        return view('admin.blogs.index',compact('success','error','department','blogs'));

        }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Department $department)
    {
        return view('admin.blogs.create',compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Department $department)
    {
        
    $request->validate([
        'title'=>['required','string','max:255'],
        'date'=>['required','date'],
        'blog_img'=>['image','dimensions:min_width=100,min_height=100' ,'nullable','mimes:jpeg,png,webp,svg'],
        'description'=>['nullable','max:1000','string'],
        'tags'=>['nullable'],   
        ]);

        $tags = json_decode($request->tags,true);
        $arrayOfTags=collect($tags)->pluck('value')->toArray();

      if($request->hasFile('blog_img')){
        $file = $request->file('blog_img');
        $img_name=uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('blogs_img'),$img_name);
        $path ='blogs_img/'.$img_name;
      }
      
      
      
        $created = Blog::create([
        'title'=>$request->title,
        'date'=>$request->date,
        'blog_img'=>$path ?? null,
        'description' => $request->description,
        'tags'=>$arrayOfTags,
        'department_id'=>$department->id,
        'hospital_id'=>$department->hospital_id
        ]);
        

        if($created){
            return redirect()->route('admin.blogs.index',$department->id);
        }else{
            return redirect()->route('admin.blogs.create',$department->id);
        }

        }

    /**
     * Display the specified resource.
     */
    public function show(Department $department,Blog $blog)
    {
        return view('admin.blogs.show',compact('department','blog'));   
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department ,Blog $blog)
    {
         return view('admin.blogs.edit',compact('department','blog'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Department $department,Blog $blog){
       
    $old_img = $blog->blog_img; 
    
    $request->validate([
        'title'=>['required','string','max:255'],
        'date'=>['required','date'],
        'blog_img'=>['image','dimensions:min_width=100,min_height=100' ,'nullable','mimes:jpeg,png,webp,svg'],
        'description'=>['nullable','max:1000','string'],
        'tags'=>['nullable'],   
        ]);

        $tags = json_decode($request->tags,true);
        $arrayOfTags=collect($tags??[])->pluck('value')->toArray();

      if($request->hasFile('blog_img')){
      
        if($old_img && file_exists(public_path($old_img))){
            unlink(public_path($old_img));
        }

      $file = $request->file('blog_img');
        $img_name=uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('blogs_img'),$img_name);
        $path ='blogs_img/'.$img_name;
      }
      
      
      
        $updated = $blog->update([
        'title'=>$request->title,
        'date'=>$request->date,
        'blog_img'=>$path ?? $old_img ,
        'description'=> $request->description,
        'tags'=>$arrayOfTags,
        'department_id'=>$blog->department_id
        ]);
        

        if($updated){
            return redirect()->route('admin.blogs.index',$department->id);
        }else{
            return redirect()->route('admin.blogs.edit',$department->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department , Blog $blog)
    {
       $deleted = $blog->delete();
       $old_img = $blog->blog_img; 
       if($old_img && file_exists(public_path($old_img))){
            unlink(public_path($old_img));
        }
     if($deleted){

         return redirect()->route('admin.blogs.index',$department->id);

        }

    }
}