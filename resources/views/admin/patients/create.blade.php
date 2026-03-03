@extends('admin.layout.master')
@section('title','إضافة مريض جديد')
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
              <form action="{{ route('admin.patients.store',[$department->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Phone Number</label>
                    <input type="text" class="form-control @error('phone_num') is-invalid @enderror" id="phone_num" name="phone_num" >
                     <x-errors name="name"/>
                  </div>
                
                  
                   <div class="form-group">
                    <label>City</label>
                    <select name="country" class="form-control @error('country') is-invalid @enderror select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="8" tabindex="-1" aria-hidden="true">
                      <option data-select2-id="10">-select-</option>
                     @foreach (\App\Enum\CountryNameStatus::cases() as $country)
                         <option value="{{ $country->value }}">{{ $country->label() }}</option>
                     @endforeach
                    </select>
                    {{-- <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="9" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-0cmh-container"><span class="select2-selection__rendered" id="select2-0cmh-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> --}}
                     <x-errors name="country"/>
                  </div>               
                 
                   <div class="form-group"> 
                        <label for="patient_img">Patient Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control @error('patient_img') is-invalid @enderror" id="patient_img" name="patient_img">
                    <x-errors name="patient_img"/>
                      </div>
                      
                    </div>
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