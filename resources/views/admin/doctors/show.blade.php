@extends('admin.layout.master')
@section('title','عرض تفاصيل الطبيب')

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
    
    /* تحسين Carousel */
    .carousel-item video {
        height: 500px;
        object-fit: cover;
    }
    
    .carousel-item img {
        height: 400px;
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
    
    /* صورة الطبيب الكبيرة */
    .doctor-main-img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid #fff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    
    .doctor-carousel-img {
        max-height: 400px;
        object-fit: cover;
        border-radius: 10px;
    }
    
    /* للجوال */
    @media (max-width: 768px) {
        .nav-tabs .nav-link {
            padding: 0.5rem 0.75rem;
            font-size: 0.9rem;
        }
        
        .carousel-item img,
        .carousel-item video {
            height: 300px;
        }
        
        .card-img-top {
            height: 150px;
        }
        
        .doctor-main-img {
            width: 100px;
            height: 100px;
        }
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
                <a href="{{ route('admin.departments.index', $department->hospital_id) }}">
                    <i class="fas fa-stethoscope"></i>
                    <span class="mx-2">أقسام المستشفى</span>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.doctors.index', $department->id) }}">
                    <i class="fas fa-user-md"></i>
                    <span class="mx-2">أطباء القسم</span>
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <i class="fas fa-info-circle"></i>
                تفاصيل الطبيب
            </li>
        </ol>
    </nav>

    {{-- Header --}}
    <div class="main-section mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex align-items-center gap-3 mb-3 mb-md-0">
                <figure class="mb-0">
                    @if($doctor->doctor_img && file_exists(public_path($doctor->doctor_img)))
                        <img src="{{ asset($doctor->doctor_img) }}" alt="صورة {{ $doctor->name }}" 
                             class="doctor-main-img">
                    @else
                        <div class="doctor-main-img bg-primary d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-md fa-3x text-white"></i>
                        </div>
                    @endif
                </figure>
                <div>
                    <h2 class="mb-1">{{ $doctor->name }}</h2>
                    <div class="d-flex gap-3 flex-wrap">
                        <div class="rate d-flex align-items-center gap-2">
                            <i class="fas fa-star text-warning"></i>
                            <span class="fw-bold">5.0</span>
                            <span class="text-muted">(55 تقييم)</span>
                        </div>
                        <div class="address d-flex align-items-center gap-2">
                            <i class="fas fa-hospital text-primary"></i>
                            <span>{{ $doctor->hospital->name ?? 'غير محدد' }}</span>
                        </div>
                        <div class="department d-flex align-items-center gap-2">
                            <i class="fas fa-stethoscope text-success"></i>
                            <span>{{ $doctor->department->name ?? 'غير محدد' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.doctors.edit', [$department->id, $doctor->id]) }}" class="btn btn-warning">
                    <i class="fas fa-edit me-2"></i>تعديل
                </a>
                <form action="{{ route('admin.doctors.delete', [$department->id, $doctor->id]) }}" 
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

    {{-- Carousel --}}
    @if($doctor->doctor_img && file_exists(public_path($doctor->doctor_img)))
    =
                <img src="{{ asset($doctor->doctor_img) }}" alt="صورة {{ $doctor->name }}">
            </div>
        </div>
        
        {{-- يمكن إضافة صور إضافية هنا --}}
        {{-- 
        <div class="carousel-item">
            <img src="{{ asset('path/to/another/image.jpg') }}" class="d-block w-100 doctor-carousel-img">
        </div>
        --}}
        
        <button class="carousel-control-prev" type="button" data-bs-target="#doctorCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">السابق</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#doctorCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">التالي</span>
        </button>
    </div>
    @endif

    {{-- CS Tabs --}}
    <ul class="nav nav-tabs" id="doctorTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" 
                    data-bs-target="#overview" type="button" role="tab">
                <i class="fas fa-eye me-2"></i>نظرة عامة
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="info-tab" data-bs-toggle="tab" 
                    data-bs-target="#info" type="button" role="tab">
                <i class="fas fa-info-circle me-2"></i>معلومات الطبيب
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" 
                    data-bs-target="#contact" type="button" role="tab">
                <i class="fas fa-address-card me-2"></i>معلومات الاتصال
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="related-tab" data-bs-toggle="tab" 
                    data-bs-target="#related" type="button" role="tab">
                <i class="fas fa-link me-2"></i>معلومات ذات صلة
            </button>
        </li>
    </ul>

    {{-- Tab Content --}}
    <div class="tab-content" id="doctorTabsContent">
        {{-- تاب النظرة العامة --}}
        <div class="tab-pane fade show active" id="overview" role="tabpanel" tabindex="0">
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="mb-3 border-bottom pb-2">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        عن الطبيب
                    </h4>
                    <div class="doctor-description">
                        <p class="lead mb-4">{{ $doctor->description }}</p>
                        
                       
                <div class="col-lg-4">
                    <div class="card border-primary mb-4">
                        <div class="card-header bg-primary text-white">
                            <i class="fas fa-stethoscope me-2"></i>معلومات القسم
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $doctor->department->name ?? 'غير محدد' }}</h5>
                            @if($doctor->department && $doctor->department->description)
                            <p class="card-text small text-muted">
                                {{ Str::limit($doctor->department->description, 100) }}
                            </p>
                            @endif
                            <a href="{{ route('admin.departments.show', [$department->hospital_id,$department->id]) }}" 
                               class="btn btn-outline-primary btn-sm mt-2">
                                <i class="fas fa-external-link-alt me-1"></i>
                                عرض تفاصيل القسم
                            </a>
                        </div>
                    </div>
                    
                    <div class="card border-success">
                        <div class="card-header bg-success text-white">
                            <i class="fas fa-hospital me-2"></i>معلومات المستشفى
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $doctor->hospital->name ?? 'غير محدد' }}</h5>
                            <ul class="list-unstyled small">
                                @if($doctor->hospital && $doctor->hospital->city)
                                <li class="mb-1">
                                    <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                    {{ $doctor->hospital->city }}
                                </li>
                                @endif
                                @if($doctor->hospital && $doctor->hospital->address)
                                <li class="mb-1">
                                    <i class="fas fa-location-arrow text-info me-2"></i>
                                    {{ Str::limit($doctor->hospital->address, 50) }}
                                </li>
                                @endif
                            </ul>
                            <a href="{{ route('admin.hospitals.show', $department->hospital_id) }}" 
                               class="btn btn-outline-success btn-sm mt-2">
                                <i class="fas fa-external-link-alt me-1"></i>
                                عرض تفاصيل المستشفى
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- تاب معلومات الطبيب --}}
       
        
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // حفظ التاب النشط في localStorage لتذكر التحديد
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('#doctorTabs button[data-bs-toggle="tab"]');
        const activeTab = localStorage.getItem('activeDoctorTab');
        
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
                localStorage.setItem('activeDoctorTab', target);
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
        
        // إيقاف الكاروسيل التلقائي
        var carouselEl = document.getElementById('doctorCarousel');
        if (carouselEl) {
            var carousel = new bootstrap.Carousel(carouselEl, { 
                interval: false,
                ride: false
            });
        }
    });
</script>
@endpush