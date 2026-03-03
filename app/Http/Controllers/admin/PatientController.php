<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PatientController extends Controller
{
    public function index(Department $department){

$success=session('success');
$error=session('error');
$patients = $department->patients;
return view('admin.patients.index',compact('department','patients','success','error'));

}

public function create(Department $department){

return view('admin.patients.create',compact('department'));        

}

public function store(Request $request,Department $department){
    
    $request->validate([
         'phone_num'=>['required','string','max:255'], 
         'country' =>['required','string'],
         'patient_img'=>['image','dimensions:min_width=100,min_height=100' ,'nullable','mimes:jpeg,png,webp'],
    ]);        

   if($request->hasFile('patient_img')){
     $file = $request->file('patient_img');
     $img_name = uniqid().'.'. $file->getClientOriginalExtension();
     $file->move(public_path('patients_img'),$img_name);
     $path = 'patients_img/'.$img_name; 
     }
   
   
   
    $patient = Patient::create([
        'full_name'=>Auth::user()->name,
        'phone_num'=>$request->phone_num,
         'country' =>$request->country,
         'patient_img'=>$path,
         'user_id'=>Auth::id(),
         'hospital_id'=>$department->hospital_id,
         'department_id'=>$department->id
         
    ]);

    if($patient){
        return redirect()->route('admin.patients.index',[$department->id])->with('success','user added !');
    }else{
        return redirect()->route('admin.patients.create',[$department->id])->with('error','user not added !');
    }
    }    
    
    
    
public function show(Department $department,Patient $patient){
    
    $priceQuotes = $patient->priceQuotes;
 

    return view('admin.patients.show')->with([
    'department' =>$department,    
    'priceQuotes' => $priceQuotes,
    'patient' => $patient

    ]);    
}    


public function edit(Department $department,Patient $patient){
        return view('admin.patients.edit')->with([
            'department'=>$department,
            'patient' =>$patient
        ]);
    }    
    
public function update(Request $request , Department $department , Patient $patient){
  $old_img = $patient->patient_img;
  $request->validate([
         'phone_num'=>['required','string','max:255'], 
         'country' =>['required','string'],
         'patient_img'=>['image','dimensions:min_width=100,min_height=100' ,'nullable','mimes:jpeg,png,webp'],
    ]);        

   if($request->hasFile('patient_img')){
     
    if( $old_img && file_exists(public_path($old_img))){
        unlink(public_path($old_img));
     } 
   
   
   $file = $request->file('patient_img');
     $img_name = uniqid().'.'. $file->getClientOriginalExtension();
     $file->move(public_path('patients_img'),$img_name);
     $path = 'patients_img/'.$img_name; 
     }
   
     
   
   
    $updated = $patient->update([
         'phone_num'=>$request->phone_num,
         'country' =>$request->country,
         'patient_img'=>$path ?? $old_img,
         'user_id'=>Auth::user()->id,
         'hospital_id'=>$department->hospital_id,
         'deparrtment_id'=>$department->id
         
    ]);

    
    
    if($updated){
     
      return redirect()->route('admin.patients.index',$department->id)->with('success','user updated !');
    }else{
        return redirect()->route('admin.patients.create',$department->id)->with('error','user not updated !');
    }

    }    


public function destroy(Patient $patient , Department $department){
   
    $old_img=$patient->patient_img;
    
    $deleted=$patient->delete();
  
    if($old_img && file_exists(public_path('old_img'))){
         unlink(public_path($old_img));
   }
    if($deleted){
        return redirect()->route('admin.patients.index',$department->id)->with('success','user deleted !');
    }
    
        }

}
