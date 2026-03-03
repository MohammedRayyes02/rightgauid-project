@extends('admin.layout.master')
@section('title','إنشاء  قسم')
@push('css')
@endpush
@section('content')

<div class="container">
<div>
              <div class="card-header">
                <h3 class="card-title">Create Department</h3>
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
              <form action="{{ route('admin.departments.store',$hospital->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Department Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Department Name">
                  </div>
                 
                  
                    <div class="form-group"> 
                        <label for="department_img">Department Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="department_img" name="department_img">
                      
                      </div>
                      
                    </div>
                  </div>
                  
                  
                   <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Description">
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