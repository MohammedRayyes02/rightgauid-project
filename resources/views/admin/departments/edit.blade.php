@extends('admin.layout.master')
@section('title','تعديل صفحة أقسام المشفى')
@push('css')
  
@endpush
@section('content')

<div class="container">
<div>
              <div class="card-header">
                <h3 class="card-title">Edit Department</h3>
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
              <form action="{{ route('admin.departments.update',[$hospital->id,$department->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                  <div class="form-group">
                    <label for="name">Department Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$department->name) }}" placeholder="Enter Hospital Name">
                  </div>
                         
                
                  
                  <div class="mb-3">
    <label for="hospital_img" class="form-label">Department Image</label>
    
    <!-- حقل رفع الصورة -->
    <input type="file" class="form-control" id="department_img" name="department_img">

    <!-- عرض الصورة الحالية إذا موجودة -->
    @if($department->department_img)
        <div class="mt-2">
            <img 
                src="{{ asset($department->department_img) }}" 
                alt="Department Image"
                width="150"
                class="img-thumbnail"
                
                >
        </div>
    @endif
</div>
 

                   <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control" id="description" name="description"  placeholder="Description">{{ old('description',$hospital->description) }}</textarea>
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