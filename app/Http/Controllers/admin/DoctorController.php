<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;


class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Department $department)
    {
     
    $success=Session('success');
    $error=Session('error');
    
    $doctors = $department->doctors;
         
     
     return view('admin.doctors.index')->with([
        'success'=>$success,
        'error'=>$error,
        'department'=>$department,
        'doctors'=>$doctors
        
     ]) ;
    
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Department $department)
    {
        return view('admin.doctors.create')->with([
            
            'department'=>$department    
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Department $department)
    {
        $path = null;

        $request->validate([
            'name'=>['required','max:255'],
            'doctor_img'=>['nullable','dimensions:min_width=450,min_height=450','mimes:png,jpg,jpeg'],
            'description'=>['nullable','max:1000'],
            
        ]);

        
      
        if($request->hasFile('doctor_img')){
            $file=$request->doctor_img;
            $img_name=time(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('doctors_img'),$img_name);
            $path='doctors_img/'.$img_name;
            }
        
        
        $created= Doctor::create([
            'name'=>$request->name,
            'doctor_img'=>$path ,
            'description'=>$request->description,
            'hospital_id'=>$department->hospital_id,
            'department_id'=>$department->id
        ]);

        if($created){
          
        return redirect()->route('admin.doctors.index',[$department->id])->with('success','doctor added !');
            }else{
            return redirect()->route('admin.doctors.index',[$department->id])->with('error','doctor not added !');
            }
        
        }

    /**
     * Display the specified resource.
     */
    public function show(Department $department,Doctor $doctor)
    {
     return view('admin.doctors.show')->with([
        
        'department'=>$department,
        'doctor'=>$doctor
     ]) ;  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department,Doctor $doctor)
    {
         return view('admin.doctors.edit')->with([
        'department'=>$department,
        'doctor'=>$doctor
     ]) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Department $department,Doctor $doctor )
    {
        $old_img=$doctor->doctor_img;
        
     $request->validate([
        'name'=>['required','max:255'],
        'doctor_img'=>['nullable','dimensions:min_width=200,min_height=200','mimes:png,jpg,jpeg'],
        'description'=>['nullable','max:1000'],
            
        ]);
    
        if($request->hasFile('doctor_img')){
            
        
        
        if( $old_img && file_exists(public_path($old_img))){
            unlink(public_path($old_img));
        } 
      

       
            $file=$request->file('doctor_img');
            $img_name=time(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('doctors_img'),$img_name);
            $path='doctors_img/'.$img_name;
            }
       
       
       
            $updated=$doctor->update([
            'name'=>$request->name,
            'doctor_img'=>$path ?? $old_img,
            'description'=>$request->description,
            'department_id'=>$department->id
        ]);

        
        if( $old_img && file_exists(public_path($old_img))){
            unlink(public_path($old_img));
        } 
      
      
        if($updated){
          
        return redirect()->route('admin.doctors.index',[$department->id])->with('success','doctor updated !');
            }else{
            return redirect()->route('admin.doctors.index',[$department->id])->with('error','doctor not updated !');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department,Doctor $doctor)
    {
       $img = $doctor->doctor_img;
        
        $deleted = $doctor->delete();
     
        if($img && file_exists(public_path($img))){
            unlink(public_path($img));
        } 
        
        if($deleted){
            return redirect()->route('admin.doctors.index',[$department->id])->with('success','doctor is deleted !');
        }else{
               return redirect()->route('admin.doctors.index',[$department->id])->with('success','doctor not deleted !');
        }
    
        }
}
