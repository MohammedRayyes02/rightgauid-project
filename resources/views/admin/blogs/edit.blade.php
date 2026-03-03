@extends('admin.layout.master')
@section('title','تعديل مقال')
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
              <form action="{{ route('admin.blogs.update',[$department->id,$blog->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
               
              @method('PUT')
              <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title',$blog->title) }}" placeholder="Enter title of article">
                     <x-errors name="title"/>
                  </div>
                 
               
                <div class="card-body">
                  <div class="form-group">
                    <label for="date">Date of Publish</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $blog->date ? $blog->date->format('Y-m-d') : '') }}" >
                     <x-errors name="date"/>
                  </div>
               
              
                    <div class="card-body">
                  <div class="form-group">
                    <label for="blog_img">Blog img</label>
                    <input type="file" class="form-control @error('blog_img') is-invalid @enderror" id="blog_img" name="blog_img" >
                     <x-errors name="blog_img"/>
                  
                  
                    @if($blog->blog_img)
        <div class="mt-2">
            <img 
                src="{{ asset($blog->blog_img) }}" 
                alt="Department Image"
                width="150"
                class="img-thumbnail">
  
                </div>
              @endif               
                 </div>
              
              
              
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea  class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="description">
                    {{ $blog->description }}
                    </textarea>
                      <x-errors name="description"/>
                  </div>
                
                  
                 
                  <div class="form-group">
                    <label for="tags">Tags</label>
                      <input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags" 
                       value='{{ old("tags", isset($blog) ? json_encode(collect($blog->tags)->map(fn($t) => ["value" => $t])) : "") }}'
                      placeholder="مواضيع ذات صلة">
                    
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