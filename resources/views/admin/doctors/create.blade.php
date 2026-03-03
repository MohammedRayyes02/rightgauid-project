@extends('admin.layout.master')
@section('title','إضافة طبيب')
@push('css')
@endpush
@section('content')

<div class="container">
<div>
              <div class="card-header">
                <h3 class="card-title">add new doctor</h3>
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
              <form action="{{ route('admin.doctors.store',[$department->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Doctor Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Department Name">
                  </div>
                 
                  
                    <div class="form-group"> 
                        <label for="doctor_img">Doctor Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="doctor_img" name="doctor_img">
                      
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