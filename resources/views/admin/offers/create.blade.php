@extends('admin.layout.master')
@section('title','إضافة عرض')
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
              <form action="{{ route('admin.offers.store',$hospital->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Offer Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter offer title">
                     <x-errors name="title"/>
                  </div>
                 
                   <div class="form-group">
                    <label for="old_price">Old Price</label>
                    <input type="text" class="form-control @error('old_price') is-invalid @enderror" id="old_price" name="old_price" placeholder="old_price">
                    <x-errors name="old_price"/>
                  </div>
                 
                  
                  
                     <div class="form-group">
                    <label for="description">Persantage Offer</label>
                    <input type="text" class="form-control @error('persantage_offer') is-invalid @enderror" id="persantage_offer" name="persantage_offer" id="discount" placeholder="Persantage Offer">
                     <x-errors name="persantage_offer"/>  
                  </div>
                 
                  
                  
                  <div class="form-group">
                    <label for="new_price">New Price</label>
                    <input type="text" class="form-control @error('new_price') is-invalid @enderror" id="new_price" name="new_price" placeholder="new_price" readonly> 
                    <x-errors name="new_price"/>
                  </div>
                 
                 
                    <div class="form-group"> 
                        <label for="hospital_img">Offer Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control @error('offer_img') is-invalid @enderror" id="offer_img" name="offer_img">
                    <x-errors name="offer_img"/>
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
  <script>
    const oldPriceInput = document.getElementById('old_price');
    const discountInput = document.getElementById('persantage_offer');
    const newPriceInput = document.getElementById('new_price');

    function calculateNewPrice() {
        let oldPrice = parseFloat(oldPriceInput.value) || 0;
        let discount = parseFloat(discountInput.value) || 0;

        let newPrice = oldPrice - (oldPrice * discount / 100);

        newPriceInput.value = newPrice.toFixed(2);
    }

    oldPriceInput.addEventListener('input', calculateNewPrice);
    discountInput.addEventListener('input', calculateNewPrice);
</script>

@endpush