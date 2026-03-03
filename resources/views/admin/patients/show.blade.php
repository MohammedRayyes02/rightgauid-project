@extends('admin.layout.master')

@section('title','تفاصيل المريض')

@section('content')

<div class="container-fluid">

<div class="row">

{{-- Sidebar --}}
<div class="col-md-4">

<div class="card text-center mb-4">
<div class="card-body">

@if($patient->patient_img)
<img src="{{ asset($patient->patient_img) }}" width="120" class="rounded-circle mb-3">
@else
<i class="fas fa-user-circle fa-5x text-muted mb-3"></i>
@endif

<h5>{{ $patient->full_name }}</h5>

<p class="text-muted small">
{{ $patient->country }}<br>
{{ $patient->phone_num }}
</p>

<hr>

<ul class="list-group text-start">

<li class="list-group-item">
<strong>القسم:</strong>
{{ $department->name }}
</li>

<li class="list-group-item">
<strong>عدد عروض السعر:</strong>
<span class="badge bg-success">
{{ $priceQuotes->count() }}
</span>
</li>

</ul>

<hr>

<a href="{{ route('admin.priceQuotes.create',$department->hospital_id) }}"
class="btn btn-primary w-100 mb-2">
<i class="fas fa-plus"></i> إضافة عرض سعر
</a>

<a href="{{ route('admin.patients.edit',[$department->id,$patient->id]) }}"
class="btn btn-outline-warning w-100">
<i class="fas fa-edit"></i> تعديل المريض
</a>

</div>
</div>

</div>

{{-- Main --}}
<div class="col-md-8">

<h4 class="mb-3">
<i class="fas fa-file-invoice-dollar text-success"></i>
عروض الأسعار
</h4>



<div class="table-responsive">
<table class="table table-bordered text-center align-middle">

<thead class="table-light">
<tr>
<th>العنوان</th>
<th>القسم</th>
<th>اخر إجراء للفحوصات</th>
<th>حالة الطلب</th>
<th>تاريخ الانشاء</th>
</tr>
</thead>

<tbody>
@foreach($priceQuotes as $pricequote)
<tr>

<td>{{ $pricequote->title }}</td>
<td>{{ $pricequote->suggested_department  }}</td>
<td>{{ $pricequote->services_requested  }}</td>
<td>{{ $pricequote->last_test  }}</td>
<td>{{ $pricequote->order_status }}</td>
<td>{{ $pricequote->created_at->format('Y-m-d') }}</td>

<td>

<a href="{{ route('admin.priceQuotes.show',[$pricequote->department->id,$pricequote->id]) }}"
class="btn btn-sm btn-primary">
<i class="fas fa-eye"></i>
</a>

<a href="{{ route('admin.priceQuotes.edit',[$pricequote->department->id,$pricequote->id]) }}"
class="btn btn-sm btn-warning">
<i class="fas fa-edit"></i>
</a>

</td>

</tr>
@endforeach
</tbody>

</table>
</div>

</div>

</div>
</div>

@endsection
