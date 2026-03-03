@extends('admin.layout.master')
@section('title','تفاصيل طلب عرض السعر')

@push('css')
<style>
.nav-tabs{
border-bottom:2px solid #dee2e6;
margin-bottom:20px
}
.nav-tabs .nav-link.active{
border-bottom:3px solid #0d6efd;
color:#0d6efd
}
.tab-content{
background:#fff;
padding:25px;
border:1px solid #dee2e6;
border-top:none
}
.card{border:1px solid #e9ecef}
.main-section{
background:#f8f9fa;
padding:20px;
border-radius:10px;
margin-bottom:20px
}
</style>
@endpush

@section('content')
<div class="container-fluid" dir="rtl">

{{-- Breadcrumb --}}
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
<li class="breadcrumb-item">
<a href="{{ route('admin.priceQuotes.index',$hospital->id) }}">طلبات عرض السعر</a>
</li>
<li class="breadcrumb-item active">التفاصيل</li>
</ol>
</nav>

{{-- Header --}}
<div class="main-section">
<div class="d-flex justify-content-between">

<div>
<h3>{{ $pricequote->title }}</h3>
<span class="badge bg-primary">{{ $hospital->name }}</span>
</div>

<div>
<a href="{{ route('admin.priceQuotes.edit',[$hospital->id,$pricequote->id]) }}" class="btn btn-warning">تعديل</a>

<form method="POST"
action="{{ route('admin.priceQuotes.delete',[$hospital->id,$pricequote->id]) }}"
class="d-inline">
@csrf
@method('DELETE')
<button class="btn btn-danger">حذف</button>
</form>
</div>

</div>
</div>

{{-- Tabs --}}
<ul class="nav nav-tabs">
<li class="nav-item">
<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#overview">
نظرة عامة
</button>
</li>

<li class="nav-item">
<button class="nav-link" data-bs-toggle="tab" data-bs-target="#files">
الملفات
<span class="badge bg-primary">{{ $pricequote->files->count() }}</span>
</button>
</li>

<li class="nav-item">
<button class="nav-link" data-bs-toggle="tab" data-bs-target="#info">
معلومات إضافية
</button>
</li>
</ul>

<div class="tab-content">

{{-- Overview --}}
<div class="tab-pane fade show active" id="overview">

<div class="row">
<div class="col-md-6">
<h5>القسم المقترح</h5>
<p>{{ $pricequote->suggested_department }}</p>

<h5>الخدمات المطلوبة</h5>
<p>{{ $pricequote->services_requested }}</p>

<h5>آخر فحص</h5>
<p>{{ $pricequote->last_test }}</p>
</div>
</div>

</div>

{{-- Files --}}
<div class="tab-pane fade" id="files">

@if($pricequote->files->count())

<div class="row">
@foreach($pricequote->files as $file)
<div class="col-md-3 mb-3">
<div class="card p-3 text-center">

<i class="fas fa-file fa-3x text-primary mb-2"></i>

<a href="{{ asset($file->path) }}" target="_blank">
{{ $file->original_name }}
</a>

</div>
</div>
@endforeach
</div>

@else

<div class="text-center text-muted py-5">
لا يوجد ملفات مرفقة
</div>

@endif

</div>

{{-- Info --}}
<div class="tab-pane fade" id="info">

<ul class="list-group">

<li class="list-group-item d-flex justify-content-between">
تاريخ الإنشاء
<span>{{ $pricequote->created_at->format('Y-m-d') }}</span>
</li>

<li class="list-group-item d-flex justify-content-between">
آخر تحديث
<span>{{ $pricequote->updated_at->format('Y-m-d') }}</span>
</li>

</ul>

</div>

</div>

</div>
@endsection
