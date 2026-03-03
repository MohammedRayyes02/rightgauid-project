@extends('admin.layout.master')
@section('title','تعديل صفحة مشفى')
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
             
             @if ($errors->any()){
              <div>
              @foreach ($errors->all() as $error )
                {{ $error }}
              @endforeach
              </div>
             }
               
             @endif
              <form action="{{ route('admin.hospitals.update',$hospital->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                  <div class="form-group">
                    <label for="name">Hospital Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$hospital->name) }}" placeholder="Enter Hospital Name">
                  </div>
                  <div class="form-group">
                    <label>City</label>
                    <select name="city" class="form-control select2 select2-hidden-accessible"  style="width: 100%;" data-select2-id="8" tabindex="-1" aria-hidden="true">
                      {{-- <option data-select2-id="10" >-select-</option> --}}
                     @foreach (\App\Enum\CityNameStatus::cases() as $city)
                         <option value="{{ $city->value }}"  {{ old('city', $hospital->city ?? '') == $city->value ? 'selected' : '' }}>{{ $city->label() }}</option>
                     @endforeach
                    </select>
                    {{-- <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="9" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-0cmh-container"><span class="select2-selection__rendered" id="select2-0cmh-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> --}}
                  </div>               
                
                   <div class="form-group">
                    <label for="year_of_establishment">Year Of Establishment</label>
                    <input type="text" class="form-control" id="year_of_establishment" name="year_of_establishment" value="{{ old('year_of_establishment',$hospital->year_of_establishment) }}" placeholder="Year Of Establishment">
                  </div>
                 
                   <div class="form-group">
                    <label for="num_of_beds">Num Of Beds</label>
                    <input type="text" class="form-control" id="num_of_beds" name="num_of_beds" value="{{ old('num_of_beds',$hospital->num_of_beds) }}" placeholder="Num Of Beds">
                  </div>
                  
                
                   <div class="mb-3">
        <label>اختر الأقسام:</label><br>
        @foreach($departments as $department)
            <div class="form-check">
                <input type="checkbox" 
                       name="departments[]" 
                       value="{{ $department->id }}"
                       id="dep{{ $department->id }}"
                       {{ in_array($department->id, $hospitalDepartment) ? 'checked' : '' }}>

                        
                
                       <label for="dep{{ $department->id }}">
                    {{ $department->name }}
                </label>
            </div>
        @endforeach
    </div>
                
                
                  <div class="form-group">
                    <label for="tags">Facilities</label>
                    <input type="text"
       class="form-control"
       id="facilities"
       name="facilities"
       value='{{ old("facilities", isset($hospital) ? json_encode(collect($hospital->facilities)->map(fn($f) => ["value" => $f])) : "") }}'
       placeholder="المرافق العامة">
    
                </div>

                  <div class="mb-3">
    <label for="hospital_img" class="form-label">صورة المستشفى</label>
    
    <!-- حقل رفع الصورة -->
    <input type="file" class="form-control" id="hospital_img" name="hospital_img">

    <!-- عرض الصورة الحالية إذا موجودة -->
    @if($hospital->hospital_img)
        <div class="mt-2">
            <img 
                src="{{ asset($hospital->hospital_img) }}" 
                alt="Hospital Image"
                width="150"
                class="img-thumbnail"
                
                >
        </div>
    @endif
</div>

                  
                  
                  <div class="form-group"> 
                        <label for="hospital_video">Hospital video</label>
                        <div class="input-group">
                      <div class="form-label">
                        <input type="file" class="form-control" id="hospital_video" name="hospital_video">
                        @if($hospital->hospital_video)
                    <div class="mt-3">
                        <video  controls class="border rounded" t >
                            <source src="{{ asset($hospital->hospital_video) }}" >

                        </video>
                    </div>
                @endif
                       </div>
                    </div>
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