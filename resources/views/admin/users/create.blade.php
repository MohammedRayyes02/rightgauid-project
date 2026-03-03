@extends('admin.layout.master')
@section('title','إضافة مستخدم جديد')
@push('css')
@endpush
@section('content')

<div class="container">
<div>
              <div class="card-header">
                <h3 class="card-title">Create Hospital</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
             {{-- @if ($errors->any()){
              <div>
              @foreach ($errors->all() as $error )
                {{ $error }}
              @endforeach
              </div>
             }
               
             @endif --}}
              <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Hospital Name">
                     <x-errors name="name"/>
                  </div>
                
                   <div class="form-group">
                    <label for="year_of_establishment">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="email">
                    <x-errors name="email"/>
                  </div>
                 
                   <div class="form-group">
                    <label for="num_of_beds">Password/label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="password">
                    <x-errors name="password"/>
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