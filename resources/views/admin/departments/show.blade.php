@extends('admin.layout.master')
@section('title','عرض تفاصيل القسم')

@push('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    /* تحسين التابز */
    .nav-tabs {
        border-bottom: 2px solid #dee2e6;
        margin-bottom: 20px;
        flex-wrap: nowrap;
    }
    
    .nav-tabs .nav-link {
        border: 1px solid transparent;
        border-radius: 0.25rem 0.25rem 0 0;
        margin-bottom: -2px;
        color: #6c757d;
        font-weight: 500;
        padding: 0.75rem 1.5rem;
        white-space: nowrap;
    }
    
    .nav-tabs .nav-link:hover {
        border-color: #e9ecef #e9ecef #dee2e6;
        color: #495057;
    }
    
    .nav-tabs .nav-link.active {
        color: #0d6efd;
        background-color: #fff;
        border-color: #dee2e6 #dee2e6 #fff;
        border-bottom: 3px solid #0d6efd;
    }
    
    .tab-content {
        background: #fff;
        padding: 25px;
        border: 1px solid #dee2e6;
        border-top: none;
        border-radius: 0 0 0.25rem 0.25rem;
        min-height: 300px;
    }
    
    /* تحسين الكاردز */
    .card {
        transition: transform 0.3s;
        border: 1px solid #e9ecef;
        height: 100%;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    
    .card-img-top {
        height: 200px;
        object-fit: cover;
    }
    
    /* تعديلات عامة */
    .breadcrumb {
        background-color: transparent;
        padding: 0.75rem 0;
    }
    
    .main-section {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    
    .rate, .address {
        background: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 0.9rem;
    }
    
    /* للجوال */
    @media (max-width: 768px) {
        .nav-tabs .nav-link {
            padding: 0.5rem 0.75rem;
            font-size: 0.9rem;
        }
        
        .card-img-top {
            height: 150px;
        }
        
        .department-img {
            max-width: 100%;
            height: auto;
        }
    }
    
    /* صورة القسم */
    .department-img {
        max-width: 500px;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
</style>
@endpush

@section('content')
<div class="container-fluid" dir="rtl">
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">
                    <i class="fas fa-home"></i>
                    <span class="mx-2">الرئيسية</span>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.hospitals.index') }}">
                    <i class="fas fa-hospital"></i>
                    <span class="mx-2">المستشفيات</span>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.departments.index', $hospital->id) }}">
                    <i class="fas fa-stethoscope"></i>
                    <span class="mx-2">أقسام المستشفى</span>
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <i class="fas fa-info-circle"></i>
                تفاصيل القسم
            </li>
        </ol>
    </nav>

    {{-- Header --}}
    <div class="main-section mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex align-items-center gap-3 mb-3 mb-md-0">
                <figure class="mb-0">
                    @if($department->department_img && file_exists(public_path($department->department_img)))
                        <img src="{{ asset($department->department_img) }}" alt="شعار {{ $department->name }}" 
                             class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                    @else
                        <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" 
                             style="width: 100px; height: 100px;">
                            <i class="fas fa-stethoscope fa-3x text-white"></i>
                        </div>
                    @endif
                </figure>
                <div>
                    <h2 class="mb-1">{{ $department->name }}</h2>
                    <div class="d-flex gap-3 flex-wrap">
                        <div class="rate d-flex align-items-center gap-2">
                            <i class="fas fa-star text-warning"></i>
                            <span class="fw-bold">5.0</span>
                            <span class="text-muted">(55 تقييم)</span>
                        </div>
                        <div class="address d-flex align-items-center gap-2">
                            <i class="fas fa-hospital text-primary"></i>
                            <span>{{ $department->hospital->name }}</span>
                        </div>
                        @if($department->doctors && $department->doctors->count() > 0)
                        <div class="doctors-count d-flex align-items-center gap-2">
                            <i class="fas fa-user-md text-success"></i>
                            <span>{{ $department->doctors->count() }} طبيب</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.departments.edit', [$hospital->id, $department->id]) }}" class="btn btn-warning">
                    <i class="fas fa-edit me-2"></i>تعديل
                </a>
                <form action="{{ route('admin.departments.delete', [$hospital->id, $department->id]) }}" 
                      method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-btn">
                        <i class="fas fa-trash me-2"></i>حذف
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- CS Tabs --}}
    <ul class="nav nav-tabs" id="departmentTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" 
                    data-bs-target="#overview" type="button" role="tab">
                <i class="fas fa-eye me-2"></i>نظرة عامة
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="doctors-tab" data-bs-toggle="tab" 
                    data-bs-target="#doctors" type="button" role="tab">
                <i class="fas fa-user-md me-2"></i>الأطباء
                @if($department->doctors && $department->doctors->count() > 0)
                <span class="badge bg-primary ms-2">{{ $department->doctors->count() }}</span>
                @endif
            </button>
        </li>
       
       
       
       <li class="nav-item" role="presentation">
    <button class="nav-link" id="patients-tab" data-bs-toggle="tab"
            data-bs-target="#patients" type="button" role="tab">
        <i class="fas fa-procedures me-2"></i>المرضى
        @if($department->patients && $department->patients->count() > 0)
            <span class="badge bg-success ms-2">{{ $department->patients->count() }}</span>
        @endif
    </button>
</li>

       
       
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="info-tab" data-bs-toggle="tab" 
                    data-bs-target="#info" type="button" role="tab">
                <i class="fas fa-info-circle me-2"></i>معلومات إضافية
            </button>
        </li>
    </ul>

    {{-- Tab Content --}}
    <div class="tab-content" id="departmentTabsContent">
        {{-- تاب النظرة العامة --}}
        <div class="tab-pane fade show active" id="overview" role="tabpanel" tabindex="0">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="mb-3 border-bottom pb-2">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        عن القسم
                    </h4>
                    <p class="lead">{{ $department->description }}</p>
                    
                    @if($department->services)
                    <div class="mt-4">
                        <h5><i class="fas fa-concierge-bell text-success me-2"></i>الخدمات المقدمة</h5>
                        <p>{{ $department->services }}</p>
                    </div>
                    @endif
                </div>
                
                <div class="col-lg-6">
                    <div class="text-center mb-4">
                        @if($department->department_img && file_exists(public_path($department->department_img)))
                        <img src="{{ asset($department->department_img) }}" 
                             alt="{{ $department->name }}" 
                             class="department-img img-fluid">
                        @else
                        <div class="department-img bg-light d-flex align-items-center justify-content-center" 
                             style="height: 300px; border-radius: 10px;">
                            <i class="fas fa-stethoscope fa-5x text-secondary"></i>
                        </div>
                        @endif
                    </div>
                    
                
                </div>
            </div>
        </div>

        {{-- تاب الأطباء --}}
        <div class="tab-pane fade" id="doctors" role="tabpanel" tabindex="0">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">
                    <i class="fas fa-user-md text-primary me-2"></i>
                    أطباء القسم
                </h4>
                <a href="{{ route('admin.doctors.create', [$department->id]) }}" class="btn btn-success">
                    <i class="fas fa-plus me-2"></i>إضافة طبيب جديد
                </a>
            </div>
            
            @if($department->doctors && $department->doctors->count() > 0)
                <div class="row">
                    @foreach($department->doctors as $doctor)
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-img-container position-relative" style="height: 200px; overflow: hidden;">
                                @if($doctor->doctor_img && file_exists(public_path($doctor->doctor_img)))
                                <img src="{{ asset($doctor->doctor_img) }}" 
                                     class="card-img-top h-100" 
                                     alt="{{ $doctor->name }}"
                                     style="object-fit: cover;"
                                     onerror="this.src='https://via.placeholder.com/300x200?text=No+Image'">
                                @else
                                <div class="h-100 d-flex align-items-center justify-content-center bg-light">
                                    <i class="fas fa-user-md fa-4x text-secondary"></i>
                                </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $doctor->name }}</h5>
                                <p class="card-text text-muted small mb-3">
                                    {{ Str::limit($doctor->description, 80) }}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-info">
                                        <i class="fas fa-stethoscope me-1"></i>
                                        {{ $department->name }}
                                    </span>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.doctors.show', [$department->id, $doctor->id]) }}" 
                                           class="btn btn-sm btn-primary" title="عرض">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.doctors.edit', [$department->id, $doctor->id]) }}" 
                                           class="btn btn-sm btn-warning" title="تعديل">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.doctors.delete', [$department->id, $doctor->id]) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger delete-btn" title="حذف">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-user-md fa-4x text-muted mb-3"></i>
                    <h4 class="text-muted">لا يوجد أطباء في هذا القسم بعد</h4>
                    <p class="text-muted">يمكنك إضافة أطباء جدد للقسم</p>
                    <a href="{{ route('admin.doctors.create', [$department->id]) }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>إضافة أول طبيب
                    </a>
                </div>
            @endif
        </div>

     
     {{-- تاب المرضى --}}
<div class="tab-pane fade" id="patients" role="tabpanel">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>
            <i class="fas fa-procedures text-success me-2"></i>
            مرضى القسم
        </h4>

        <a href="{{ route('admin.patients.create', $department->id) }}" class="btn btn-success">
            <i class="fas fa-plus me-2"></i>إضافة مريض
        </a>
    </div>

@if($department->patients && $department->patients->count())
<div class="table-responsive">
<table class="table table-bordered table-hover text-center align-middle">

<thead class="table-light">
<tr>
<th>#</th>
<th>الصورة</th>
<th>الاسم</th>
<th>الهاتف</th>
<th>الدولة</th>
<th>إجراءات</th>
</tr>
</thead>

<tbody>
@foreach($department->patients as $patient)
<tr>
<td>{{ $loop->iteration }}</td>

<td>
@if($patient->patient_img && file_exists(public_path($patient->patient_img)))
<img src="{{ asset($patient->patient_img) }}" width="50" class="rounded-circle">
@else
<i class="fas fa-user-circle fa-2x text-muted"></i>
@endif
</td>

<td>{{ $patient->full_name }}</td>
<td>{{ $patient->phone_num }}</td>
<td>{{ $patient->country }}</td>

<td>
<a href="{{ route('admin.patients.show',[$department->id,$patient->id]) }}" class="btn btn-sm btn-primary">
<i class="fas fa-eye"></i>
</a>

<a href="{{ route('admin.patients.edit',[$department->id,$patient->id]) }}" class="btn btn-sm btn-warning">
<i class="fas fa-edit"></i>
</a>

<form action="{{ route('admin.patients.delete',[$department->id,$patient->id]) }}"
      method="POST" class="d-inline">
@csrf
@method('DELETE')
<button class="btn btn-sm btn-danger delete-btn">
<i class="fas fa-trash"></i>
</button>
</form>

</td>
</tr>
@endforeach
</tbody>

</table>
</div>

@else
<div class="text-center py-5">
<i class="fas fa-procedures fa-4x text-muted mb-3"></i>
<h5>لا يوجد مرضى بعد</h5>
</div>
@endif

</div>

     
     
        {{-- تاب معلومات إضافية --}}
        <div class="tab-pane fade" id="info" role="tabpanel" tabindex="0">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-info text-white">
                            <i class="fas fa-chart-bar me-2"></i>إحصائيات القسم
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    عدد الأطباء
                                    <span class="badge bg-primary rounded-pill">
                                        {{ $department->doctors ? $department->doctors->count() : 0 }}
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    تاريخ الإنشاء
                                    <span class="text-muted">
                                        {{ $department->created_at->format('Y-m-d') }}
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    آخر تحديث
                                    <span class="text-muted">
                                        {{ $department->updated_at->format('Y-m-d') }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-warning text-dark">
                            <i class="fas fa-tools me-2"></i>إجراءات سريعة
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="{{ route('admin.departments.edit', [$hospital->id, $department->id]) }}" 
                                   class="btn btn-outline-primary text-start">
                                    <i class="fas fa-edit me-2"></i>تعديل معلومات القسم
                                </a>
                                <a href="{{ route('admin.doctors.create', [$department->id]) }}" 
                                   class="btn btn-outline-success text-start">
                                    <i class="fas fa-plus me-2"></i>إضافة طبيب جديد
                                </a>
                                <a href="{{ route('admin.departments.index', $hospital->id) }}" 
                                   class="btn btn-outline-info text-start">
                                    <i class="fas fa-list me-2"></i>عرض جميع أقسام المستشفى
                                </a>
                                <a href="{{ route('admin.hospitals.show', $hospital->id) }}" 
                                   class="btn btn-outline-secondary text-start">
                                    <i class="fas fa-hospital me-2"></i>عرض معلومات المستشفى
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @if($department->notes)
            <div class="mt-4">
                <h5><i class="fas fa-sticky-note text-secondary me-2"></i>ملاحظات إضافية</h5>
                <div class="alert alert-light border">
                    {{ $department->notes }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // حفظ التاب النشط في localStorage لتذكر التحديد
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('#departmentTabs button[data-bs-toggle="tab"]');
        const activeTab = localStorage.getItem('activeDepartmentTab');
        
        if (activeTab) {
            const tabElement = document.querySelector(activeTab + '-tab');
            if (tabElement) {
                const tab = new bootstrap.Tab(tabElement);
                tab.show();
            }
        }
        
        tabs.forEach(tab => {
            tab.addEventListener('shown.bs.tab', function(event) {
                const target = event.target.getAttribute('data-bs-target');
                localStorage.setItem('activeDepartmentTab', target);
            });
        });
        
        // تأكيد الحذف
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('form');
                
                Swal.fire({
                    title: 'هل أنت متأكد؟',
                    text: "لن تتمكن من التراجع عن هذا الإجراء!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'نعم، احذف',
                    cancelButtonText: 'إلغاء',
                    reverseButtons: true,
                    customClass: {
                        confirmButton: 'btn btn-danger mx-2',
                        cancelButton: 'btn btn-secondary mx-2'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endpush