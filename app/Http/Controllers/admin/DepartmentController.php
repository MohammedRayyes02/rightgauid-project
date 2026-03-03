<?php

namespace App\Http\Controllers\admin;

use App\Models\Department;
use App\Models\Hospital;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Hospital $hospital)
    {

    
       $success=session('success');
       $error=session('error');
       

        $departments = $hospital->departments;
        

        return view('admin.departments.index',compact('departments','hospital','success','error'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Hospital $hospital)
    {
        
    return view('admin.departments.create',compact('hospital'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Hospital $hospital)
    {
        $validated=$request->validate([
            'name'=>['required','max:255','string'],
            'department_img'=>['nullable','image','mimes:png,jpg,jpeg,gif','dimensions:min_width=200,min_height=200'],
            'description'=>['nullable','string','max:1000']
            
            ]);
    
            $path=null;
   
            if($request->hasFile('department_img')){
                $file=$request->file('department_img');
                $img_name=time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('departments_imgs'),$img_name);
                $path='departments_imgs/'.$img_name;
                }
   
                
            
            $created= Department::create([
            'name'=>$request->name,
            'department_img'=>$path,
            'description'=>$request->description,
            'hospital_id'=>$hospital->id
            ]);
            
               // $hospital->departments()->attach($department->id);


           if($created){
                return redirect()->route('admin.departments.index',$hospital->id)->with('success','department created !');
           }else{
                return redirect()->route('admin.departments.index',$hospital->id)->with('error','department not created !');
           }
           }

    /**
     * Display the specified resource.
     */
    public function show(Hospital $hospital,Department $department)
    {
        return view('admin.departments.show')->with([
        'hospital'=>$hospital,    
        'department'=>$department
           
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hospital $hospital,Department $department)
    {
        return view('admin.departments.edit')->with([
            'department'=>$department,
            'hospital'=>$hospital
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Hospital $hospital, Department $department)
    {
          $validated=$request->validate([
            'name'=>['required','max:255','string'],
            'department_img'=>['nullable','image','mimes:png,jpg,jpeg,svg,gif','dimensions:min_width=200,min_height=200'],
            'description'=>['nullable','string','max:1000']
            ]);
    
            $old_img= $department->department_img;
            $path=$old_img;

            if($request->hasFile('department_img')){
               
            
             if ( $old_img && file_exists(public_path($old_img))) {
                 unlink(public_path($old_img));
            }
          
            
            $file=$request->file('department_img');
                $img_name=time().'.'.$file->getClientOriginalExtension();
                  $file->move(public_path('departments_imgs'),$img_name);
                   $path='departments_imgs/'.$img_name;
   
                }
                
   
            $updated= $department->update([
            'name'=>$request->name,
            'department_img'=>$path ?? $old_img,
            'description'=>$request->description
           ]);
            
           

           
           if($updated){
                return redirect()->route('admin.departments.index',$hospital->id)->with('success','department updated !');
           }else{
                return redirect()->route('admin.departments.index',$hospital->id)->with('error','department not updated !');
           }
       
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hospital $hospital,Department $department)
    {
    
    // $hospital->departments()->detach($department->id);
    
    $old_img = $department->department_img;
    $deleted=$department->delete();
    
    if ($old_img && file_exists(public_path($old_img))) {
    unlink(public_path($old_img));
    }

    if($deleted){
        return redirect()->route('admin.departments.index',$hospital->id)->with('success','department is deleted !');
    }

    }


  }
