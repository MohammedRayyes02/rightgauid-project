@extends('admin.layout.master')
@section('title','إنشاء صفحة مشفى')
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
              <form action="{{ route('admin.hospitals.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Hospital Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Hospital Name">
                     <x-errors name="name"/>
                  </div>
                  <div class="form-group">
                    <label>City</label>
                    <select name="city" class="form-control @error('city') is-invalid @enderror select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="8" tabindex="-1" aria-hidden="true">
                      <option data-select2-id="10">-select-</option>
                     @foreach (\App\Enum\CityNameStatus::cases() as $city)
                         <option value="{{ $city->value }}">{{ $city->label() }}</option>
                     @endforeach
                    </select>
                    {{-- <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="9" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-0cmh-container"><span class="select2-selection__rendered" id="select2-0cmh-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> --}}
                     <x-errors name="city"/>
                  </div>               
                
                   <div class="form-group">
                    <label for="year_of_establishment">Year Of Establishment</label>
                    <input type="text" class="form-control @error('year_of_establishment') is-invalid @enderror" id="year_of_establishment" name="year_of_establishment" placeholder="Year Of Establishment">
                    <x-errors name="year_of_establishment"/>
                  </div>
                 
                   <div class="form-group">
                    <label for="num_of_beds">Num Of Beds</label>
                    <input type="text" class="form-control @error('num_of_beds') is-invalid @enderror" id="num_of_beds" name="num_of_beds" placeholder="Num Of Beds">
                    <x-errors name="num_of_beds"/>
                  </div>
                  
                 
                 
                  <div class="form-group">
                    <label for="tags">Facilities</label>
                      <input type="text" class="form-control @error('facilities') is-invalid @enderror" id="facilities" name="facilities" placeholder="المرافق العامة">
                     <x-errors name="facilities"/>
                    </div>

                    <div class="form-group"> 
                        <label for="hospital_img">Hospital Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control @error('hospital_img') is-invalid @enderror" id="hospital_img" name="hospital_img">
                    <x-errors name="hospital_img"/>
                      </div>
                      
                    </div>
                  </div>
                  
                  
                  <div class="form-group"> 
                        <label for="hospital_video">Hospital video</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control @error('hospital_video') is-invalid @enderror" id="hospital_video" name="hospital_video">
                         <x-errors name="hospital_video"/>
                      </div>
                    </div>
                  </div>
                  
                  

                   <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Description">
                     <x-errors name="description"/>  
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