@extends('admin.layout.master')
@section('title','إضافة مقال')
@push('css')
@endpush
@section('content')

<div class="container">
<div>
              <div class="card-header">
                <h3 class="card-title">Create article in {{ $department->name }} </h3>
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
              <form action="{{ route('admin.blogs.store',$department->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter title of article">
                     <x-errors name="title"/>
                  </div>
                 
               
                <div class="card-body">
                  <div class="form-group">
                    <label for="date">Date of Publish</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" >
                     <x-errors name="date"/>
                  </div>
               
              
                    <div class="card-body">
                  <div class="form-group">
                    <label for="blog_img">Blog img</label>
                    <input type="file" class="form-control @error('blog_img') is-invalid @enderror" id="blog_img" name="blog_img" >
                     <x-errors name="blog_img"/>
                  </div>
              
              
              
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea  class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="description">
                    </textarea>
                      <x-errors name="description"/>
                  </div>
                
                  
                 
                  <div class="form-group">
                    <label for="tags">Tags</label>
                      <input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags" placeholder="مواضيع ذات صلة">
                     <x-errors name="tags"/>
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