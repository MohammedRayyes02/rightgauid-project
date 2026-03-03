@extends('admin.layout.master')
@section('title','تعديل بيانات الطبيب ')
@push('css')
  
@endpush
@section('content')

<div class="container">
<div>
              <div class="card-header">
                <h3 class="card-title">Edit Doctor data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
             @if ($errors->any()){
              <div>
              @foreach ($errors->all() as $error )
                {{ $error }}
              @endforeach
              </div>
             }
               
             @endif
              <form action="{{ route('admin.doctors.update',[$department->id,$doctor->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                  <div class="form-group">
                    <label for="name">Doctor Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$doctor->name) }}" placeholder="Enter Hospital Name">
                  </div>
                         
                
                  
                  <div class="mb-3">
    <label for="hospital_img" class="form-label">Doctor Image</label>
    
    <!-- حقل رفع الصورة -->
    <input type="file" class="form-control" id="doctor_img" name="doctor_img">

    <!-- عرض الصورة الحالية إذا موجودة -->
    @if($doctor->doctor_img)
        <div class="mt-2">
            <img src="{{ asset($doctor->doctor_img) }}" alt="Doctor Image">
        </div>
    @endif
</div>
 

                   <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control" id="description" name="description"  placeholder="Description">{{ old('description',$doctor->description) }}</textarea>
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
</div>


@endsection
@push('js')
  
@endpush