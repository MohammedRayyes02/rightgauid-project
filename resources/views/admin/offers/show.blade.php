@extends('admin.layout.master')
@section('title','عرض تفاصيل المشفى')

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
        height: 600px;
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
        
        .carousel-item img,
        .carousel-item video {
            height: 300px;
        }
        
        .card-img-top {
            height: 150px;
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
            <li class="breadcrumb-item active" aria-current="page">
                <i class="fas fa-info-circle"></i>
                تفاصيل المستشفى
            </li>
        </ol>
    </nav>

    {{-- Header --}}
    <div class="main-section mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex align-items-center gap-3 mb-3 mb-md-0">
                <figure class="mb-0">
                    @if($hospital->hospital_img && file_exists(public_path($hospital->hospital_img)))
                        <img src="{{ asset($hospital->hospital_img) }}" alt="شعار {{ $hospital->name }}" 
                             class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                    @else
                        <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" 
                             style="width: 100px; height: 100px;">
                            <i class="fas fa-hospital fa-3x text-white"></i>
                        </div>
                    @endif
                </figure>
                <div>
                    <h2 class="mb-1">{{ $hospital->name }}</h2>
                    <div class="d-flex gap-3 flex-wrap">
                        <div class="rate d-flex align-items-center gap-2">
                            <i class="fas fa-star text-warning"></i>
                            <span class="fw-bold">5.0</span>
                            <span class="text-muted">(55 تقييم)</span>
                        </div>
                        <div class="address d-flex align-items-center gap-2">
                            <i class="fas fa-map-marker-alt text-danger"></i>
                            <span>{{ $hospital->city }}</span>
                        </div>
                        @if($hospital->phone)
                        <div class="phone d-flex align-items-center gap-2">
                            <i class="fas fa-phone text-success"></i>
                            <span>{{ $hospital->phone }}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.hospitals.edit', $hospital->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> تعديل
                </a>
                <a href="{{ route('admin.priceQuotes.create',$hospital->id) }}" class="btn btn-primary">
                    <i class="fas fa-file-alt"></i> طلب عرض سعر
                </a>
            </div>
        </div>
    </div>

    {{-- Carousel --}}
    @if($hospital->hospital_img || $hospital->hospital_video)
    <div id="carouselExampleDark" 
         class="carousel slide mb-5" 
         data-bs-ride="carousel" 
         data-bs-touch="false" 
         data-bs-interval="0">
        <div class="carousel-inner">
            @if($hospital->hospital_img)
            <div class="carousel-item active">
                <img src="{{ asset($hospital->hospital_img) }}" class="d-block w-100" alt="صورة {{ $hospital->name }}">
            </div>
            @endif

            @if($hospital->hospital_video && file_exists(public_path($hospital->hospital_video)))
            <div class="carousel-item {{ !$hospital->hospital_img ? 'active' : '' }}">
                <video class="d-block w-100" controls>
                    <source src="{{ asset($hospital->hospital_video) }}" type="video/mp4">
                    متصفحك لا يدعم تشغيل الفيديو
                </video>
            </div>
            @endif
        </div>

        @if(($hospital->hospital_img && $hospital->hospital_video) || ($hospital->hospital_img && file_exists(public_path($hospital->hospital_img))))
        {{-- Controls --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">السابق</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">التالي</span>
        </button>
        @endif
    </div>
    @endif

    {{-- CS Tabs --}}
    <ul class="nav nav-tabs" id="hospitalTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" 
                    data-bs-target="#overview" type="button" role="tab">
                <i class="fas fa-eye me-2"></i>نظرة عامة
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="departments-tab" data-bs-toggle="tab" 
                    data-bs-target="#departments" type="button" role="tab">
                <i class="fas fa-stethoscope me-2"></i>التخصصات
                @if($hospital->departments_count)
                <span class="badge bg-primary ms-2">{{ $hospital->departments_count }}</span>
                @endif
            </button>
        </li>
       
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="map-tab" data-bs-toggle="tab" 
                    data-bs-target="#map" type="button" role="tab">
                <i class="fas fa-map-marked-alt me-2"></i>الخريطة
            </button>
        </li>
    </ul>

    {{-- Tab Content --}}
    <div class="tab-content" id="hospitalTabsContent">
        {{-- تاب النظرة العامة --}}
        <div class="tab-pane fade show active" id="overview" role="tabpanel" tabindex="0">
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="mb-3 border-bottom pb-2">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        حول المستشفى
                    </h4>
                    <p class="lead">{{ $hospital->description }}</p>
                    
                    @if($hospital->details)
                    <div class="mt-4">
                        <h5><i class="fas fa-clipboard-list text-success me-2"></i>تفاصيل إضافية</h5>
                        <p>{{ $hospital->details }}</p>
                    </div>
                    @endif
                </div>
                
                <div class="col-lg-4">
                    <div class="card border-primary">
                        <div class="card-header bg-primary text-white">
                            <i class="fas fa-clipboard-check me-2"></i>معلومات الاتصال
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                    <strong>العنوان:</strong><br>
                                    {{ $hospital->address }}, {{ $hospital->city }}
                                </li>
                                @if($hospital->phone)
                                <li class="mb-3">
                                    <i class="fas fa-phone text-success me-2"></i>
                                    <strong>الهاتف:</strong><br>
                                    {{ $hospital->phone }}
                                </li>
                                @endif
                                @if($hospital->email)
                                <li class="mb-3">
                                    <i class="fas fa-envelope text-info me-2"></i>
                                    <strong>البريد الإلكتروني:</strong><br>
                                    {{ $hospital->email }}
                                </li>
                                @endif
                                @if($hospital->website)
                                <li class="mb-3">
                                    <i class="fas fa-globe text-warning me-2"></i>
                                    <strong>الموقع الإلكتروني:</strong><br>
                                    <a href="{{ $hospital->website }}" target="_blank">{{ $hospital->website }}</a>
                                </li>
                                @endif
                                <li>
                                    <i class="fas fa-calendar-alt text-secondary me-2"></i>
                                    <strong>تاريخ الإنشاء:</strong><br>
                                    {{ $hospital->created_at->format('Y-m-d') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- تاب التخصصات --}}
        <div class="tab-pane fade" id="departments" role="tabpanel" tabindex="0">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">
                    <i class="fas fa-stethoscope text-primary me-2"></i>
                    أقسام المستشفى
                </h4>
                <a href="{{ route('admin.departments.create', $hospital->id) }}" class="btn btn-success">
                    <i class="fas fa-plus me-2"></i>إضافة قسم جديد
                </a>
            </div>
            
            @if($hospital->departments && $hospital->departments->count() > 0)
                <div class="row">
                    @foreach($hospital->departments as $department)
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            @if($department->department_img && file_exists(public_path($department->department_img)))
                            <img src="{{ asset($department->department_img) }}" 
                                 class="card-img-top" 
                                 alt="{{ $department->name }}"
                                 onerror="this.src='https://via.placeholder.com/300x200?text=No+Image'">
                            @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                 style="height: 200px;">
                                <i class="fas fa-clinic-medical fa-4x text-secondary"></i>
                            </div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $department->name }}</h5>
                                <p class="card-text text-muted small">
                                    {{ Str::limit($department->description, 80) }}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-info">
                                        <i class="fas fa-user-md me-1"></i>
                                        {{ $department->doctors_count ?? 0 }} طبيب
                                    </span>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.departments.show', [$hospital->id, $department->id]) }}" 
                                           class="btn btn-sm btn-primary" title="عرض">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.departments.edit', [$hospital->id, $department->id]) }}" 
                                           class="btn btn-sm btn-warning" title="تعديل">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.departments.delete', [$hospital->id, $department->id]) }}" 
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
                    <i class="fas fa-clinic-medical fa-4x text-muted mb-3"></i>
                    <h4 class="text-muted">لا توجد أقسام لهذا المستشفى بعد</h4>
                    <p class="text-muted">يمكنك إضافة أقسام جديدة للمستشفى</p>
                    <a href="{{ route('admin.departments.create', $hospital->id) }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>إضافة أول قسم
                    </a>
                </div>
            @endif
        </div>
       
        {{-- تاب الخريطة --}}
        <div class="tab-pane fade" id="map" role="tabpanel" tabindex="0">
            <h4 class="mb-4">
                <i class="fas fa-map-marked-alt text-primary me-2"></i>
                موقع المستشفى
            </h4>
            
            @if($hospital->latitude && $hospital->longitude)
                <div class="row">
                    <div class="col-lg-8">
                        <div id="hospitalMap" 
                             style="height: 500px; width: 100%; border-radius: 8px;" 
                             data-lat="{{ $hospital->latitude }}" 
                             data-lng="{{ $hospital->longitude }}"
                             data-name="{{ $hospital->name }}"
                             data-address="{{ $hospital->address }}"></div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <i class="fas fa-info-circle me-2"></i>تفاصيل الموقع
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $hospital->name }}</h5>
                                <p class="card-text">
                                    <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                    {{ $hospital->address }}, {{ $hospital->city }}
                                </p>
                                <hr>
                                <h6 class="mt-3">الإحداثيات:</h6>
                                <ul class="list-unstyled">
                                    <li><strong>خط العرض:</strong> {{ $hospital->latitude }}</li>
                                    <li><strong>خط الطول:</strong> {{ $hospital->longitude }}</li>
                                </ul>
                                <div class="mt-4">
                                    <a href="https://www.google.com/maps?q={{ $hospital->latitude }},{{ $hospital->longitude }}" 
                                       target="_blank" class="btn btn-outline-primary w-100">
                                        <i class="fab fa-google me-2"></i>فتح في خرائط جوجل
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-warning">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle fa-2x me-3"></i>
                        <div>
                            <h5 class="alert-heading">إحداثيات الموقع غير متوفرة</h5>
                            <p class="mb-2">لم يتم تحديد إحداثيات الموقع الجغرافي لهذا المستشفى.</p>
                            <p class="mb-0"><strong>العنوان:</strong> {{ $hospital->address }}, {{ $hospital->city }}</p>
                        </div>
                    </div>
                </div>
                <div class="text-center py-4">
                    <a href="{{ route('admin.hospitals.edit', $hospital->id) }}" class="btn btn-primary">
                        <i class="fas fa-map-marker-alt me-2"></i>إضافة إحداثيات الموقع
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@if($hospital->latitude && $hospital->longitude)
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@endif

<script>
    // إيقاف الكاروسيل أثناء تشغيل الفيديو
    var carouselEl = document.getElementById('carouselExampleDark');
    if (carouselEl) {
        var carousel = bootstrap.Carousel.getInstance(carouselEl) || new bootstrap.Carousel(carouselEl, { 
            interval: 0, 
            ride: false 
        });

        document.querySelectorAll('#carouselExampleDark video').forEach(video => {
            video.addEventListener('play', () => carousel.pause());
            video.addEventListener('ended', () => carousel.cycle());
        });
    }

    // تهيئة الخريطة فقط عند فتح تاب الخريطة
    document.getElementById('map-tab')?.addEventListener('shown.bs.tab', function () {
        const mapEl = document.getElementById('hospitalMap');
        if (mapEl && !mapEl._map && mapEl.dataset.lat && mapEl.dataset.lng) {
            const lat = parseFloat(mapEl.dataset.lat);
            const lng = parseFloat(mapEl.dataset.lng);
            const name = mapEl.dataset.name;
            const address = mapEl.dataset.address;
            
            // إنشاء الخريطة
            const map = L.map('hospitalMap').setView([lat, lng], 15);
            
            // إضافة طبقة الخريطة
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                maxZoom: 19
            }).addTo(map);
            
            // إضافة علامة الموقع
            const marker = L.marker([lat, lng]).addTo(map);
            
            // إضافة popup مع المعلومات
            marker.bindPopup(`
                <div style="min-width: 200px;">
                    <h6 style="margin: 0 0 5px 0; color: #0d6efd;">${name}</h6>
                    <p style="margin: 0; font-size: 14px; color: #666;">${address}</p>
                </div>
            `).openPopup();
            
            // حفظ المرجع للخريطة
            mapEl._map = map;
        }
    });

    // حفظ التاب النشط في localStorage لتذكر التحديد
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('#hospitalTabs button[data-bs-toggle="tab"]');
        const activeTab = localStorage.getItem('activeHospitalTab');
        
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
                localStorage.setItem('activeHospitalTab', target);
            });
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
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush