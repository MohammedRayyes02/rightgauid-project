@extends('admin.layout.master')
@section('title','عرض تفاصيل المقال')

@push('css')
<style>
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

    .main-section {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .blog-img {
        max-height: 350px;
        object-fit: cover;
        border-radius: 10px;
        width: 100%;
    }

    .tag-badge {
        background: #0d6efd;
        color: #fff;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        margin: 3px;
        display: inline-block;
    }
</style>
@endpush

@section('content')
<div class="container-fluid" dir="rtl">

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                {{-- <a href="{{ route('admin.dashboard') }}"> --}}
                    <i class="fas fa-home"></i>
                    <span class="mx-2">الرئيسية</span>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.departments.index', $department->hospital_id) }}">
                    أقسام المستشفى
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.blogs.index', $department->id) }}">
                    المقالات
                </a>
            </li>
            <li class="breadcrumb-item active">
                تفاصيل المقال
            </li>
        </ol>
    </nav>

    {{-- Header --}}
    <div class="main-section">
        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <div>
                <h2 class="mb-1">{{ $blog->title }}</h2>
                <div class="text-muted">
                    <i class="fas fa-calendar-alt me-1"></i>
                    {{ $blog->date->format('Y-m-d') }}
                </div>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('admin.blogs.edit', [$department->id, $blog->id]) }}" 
                   class="btn btn-warning">
                    <i class="fas fa-edit me-2"></i>تعديل
                </a>

                <form action="{{ route('admin.blogs.delete', [$department->id, $blog->id]) }}"
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

    {{-- Tabs --}}
    <ul class="nav nav-tabs" id="blogTabs" role="tablist">
        <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab"
                    data-bs-target="#overview" type="button">
                نظرة عامة
            </button>
        </li>

        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab"
                    data-bs-target="#info" type="button">
                معلومات إضافية
            </button>
        </li>
    </ul>

    <div class="tab-content">

        {{-- Overview --}}
        <div class="tab-pane fade show active" id="overview">

            <div class="row">
                <div class="col-lg-6">

                    <h4 class="mb-3">الوصف</h4>
                    <p class="lead">
                        {{ $blog->description ?? 'لا يوجد وصف لهذا المقال.' }}
                    </p>

                    @if($blog->tags && count($blog->tags))
                        <div class="mt-4">
                            <h5>الوسوم</h5>
                            @foreach($blog->tags as $tag)
                                <span class="tag-badge">{{ $tag }}</span>
                            @endforeach
                        </div>
                    @endif

                </div>

                <div class="col-lg-6 text-center">

                    @if($blog->blog_img && file_exists(public_path($blog->blog_img)))
                        <img src="{{ asset($blog->blog_img) }}" 
                             class="blog-img">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center"
                             style="height:300px;border-radius:10px;">
                            <i class="fas fa-image fa-4x text-secondary"></i>
                        </div>
                    @endif

                </div>
            </div>

        </div>

        {{-- Info --}}
        <div class="tab-pane fade" id="info">

            <div class="card">
                <div class="card-body">

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item d-flex justify-content-between">
                            القسم
                            <span class="text-muted">
                                {{ $department->name }}
                            </span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            تاريخ الإنشاء
                            <span class="text-muted">
                                {{ $blog->created_at->format('Y-m-d') }}
                            </span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            آخر تحديث
                            <span class="text-muted">
                                {{ $blog->updated_at->format('Y-m-d') }}
                            </span>
                        </li>

                    </ul>

                </div>
            </div>

        </div>

    </div>

</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function(e){
        e.preventDefault();
        const form = this.closest('form');

        Swal.fire({
            title: 'هل أنت متأكد؟',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'نعم احذف',
            cancelButtonText: 'إلغاء'
        }).then((result)=>{
            if(result.isConfirmed){
                form.submit();
            }
        });
    });
});
</script>
@endpush