<?php

namespace App\Http\Controllers\admin;

use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hospitals=Hospital::orderBy('year_of_establishment')->get();
        return view('admin.hospitals.index',compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hospitals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , Hospital $hospital)
    {
      
        $image_path = null;
        $video_path = null;
     
        $request->validate([
            'name'=>['required','string','max:255'],
            'city'=>['required','string'],
            'year_of_establishment'=>['required','string'],
            'num_of_beds'=>['required','string'],
            'hospital_img'=>['image','dimensions:min_width=100,min_height=100' ,'nullable','mimes:jpeg,png,webp,svg'],
            'hospital_video'=>['file','max:51200' ,'nullable','mimes:mp4,mpeg,mov'],
            'description'=>['string' , 'nullable'],
            'facilities'=>['nullable'],
            
            
            ]);

       if($request->hasFile('hospital_img')){
         $file=$request->file('hospital_img');
         $image_name=time(). '.' .$file->getClientOriginalExtension();
         $file->move(public_path('hospitals_imgs'),$image_name);
         $image_path='hospitals_imgs/'.$image_name;
        }
       
       if($request->hasFile('hospital_video')){
         $file=$request->file('hospital_video');
         $video_name=time(). '.' .$file->getClientOriginalExtension();
         $file->move(public_path('hospitals_video'),$video_name);
         $video_path='hospitals_video/'.$video_name;
            
        }
       
        $facilities=json_decode($request->facilities,true);
       $array=collect($facilities)->pluck('value')->toArray();  
      
       
       

       
       $hospital= Hospital::create([
            'name'=>$request->name,
            'city'=>$request->city,
            'year_of_establishment'=>$request->year_of_establishment,
            'num_of_beds'=>$request->num_of_beds,
            'hospital_img'=>$image_path,
            'hospital_video'=>$video_path,
            'description'=>$request->description,
            'facilities'=>$array

 

        ]);
       
       
    //    if ($request->has('departments')) {
    //     $hospital->departments()->attach($request->departments);
    // }

        if($hospital){
        return redirect()->route('admin.hospitals.index')->with('success','Hospital created');
        }else{
            return redirect()->route('admin.hospitals.index')->with('error','Hospital not created !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Hospital $hospital)
    {
        return view('admin.hospitals.show')->with([
            'hospital'=>$hospital
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hospital $hospital)
    {
       $departments = Department::all();

       $hospitalDepartment=$hospital->departments()->pluck('id')->toArray(); 
       
       return view('admin.hospitals.edit')->with([
            'hospital'=>$hospital,
            'departments'=>$departments, 
            'hospitalDepartment'=> $hospitalDepartment
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hospital $hospital)
    {
        
    $old_img=$hospital->hospital_img;
    $old_video=$hospital->hospital_video;
    $image_path =$old_img;
    $video_path=$old_video;
   
    $request->validate([
            'name'=>['required','string','max:255'],
            'city'=>['required','string'],
            'year_of_establishment'=>['required','string'],
            'num_of_beds'=>['required','string'],
            'hospital_img'=>['image','dimensions:min_width=100,min_height=100' ,'nullable','mimes:jpeg,png,webp,svg'],
            'hospital_video'=>['file','max:51200' ,'nullable','mimes:mp4,mpeg,mov'],
            'description'=>['string' , 'nullable'],
            'facilities'=>['nullable']
        ]);

     
     if ($request->hasFile('hospital_img')) {

    // حذف القديم أولاً
    if ($old_img && file_exists(public_path($old_img))) {
        unlink(public_path($old_img));
    

     
         $file=$request->file('hospital_img');
         $image_name=time(). '.' .$file->getClientOriginalExtension();
         $file->move(public_path('hospitals_imgs'),$image_name);
         $image_path='hospitals_imgs/'.$image_name;
        }
       
       if($request->hasFile('hospital_video')){
        
       
       if(file_exists(public_path($old_video)) && $video_path){
        unlink(public_path($old_video));
       
       }
      
       $file=$request->file('hospital_video');
         $video_name=time(). '.' .$file->getClientOriginalExtension();
         $file->move(public_path('hospitals_video'),$video_name);
         $video_path='hospitals_video/'.$video_name;
            
        }
       
        $facilities=json_decode($request->facilities,true);
       $array=collect($facilities)->pluck('value')->toArray(); 
      
    //    dd($facilities);

       
       $updated= $hospital->update([
            'name'=>$request->name,
            'city'=>$request->city,
            'year_of_establishment'=>$request->year_of_establishment,
            'num_of_beds'=>$request->num_of_beds,
            'hospital_img'=>$image_path ?? $hospital->hospital_img,
            'hospital_video'=>$video_path ?? $hospital->hospital_video,
            'description'=>$request->description,
            'facilities'=>$array



        ]);
        
       
        
  
        
        // if($request->has('departments')){
        //      $hospital->departments()->sync($request->departments);
        // }else{
        //      $hospital->departments()->detach($request->departments);

        // }

        if($updated){
        return redirect()->route('admin.hospitals.index')->with('success','Hospital updated');
        }else{
            return redirect()->route('admin.hospitals.index')->with('error','Hospital is not updated');
        }
    

     }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hospital $hospital)
    {
        $image_path=$hospital->hospital_img;
        $video_path=$hospital->hospital_video;
        $deleted=$hospital->delete();
        
        if($image_path && file_exists(public_path($image_path))){
             unlink(public_path($hospital->hospital_img));
        
        }
        
         if($video_path && file_exists(public_path($video_path))){
             unlink(public_path($hospital->hospital_video));
        
        }

        
        if($deleted){

        return redirect()->route('admin.hospitals.index')->with('success','Hospital deleted');
        }
}
}