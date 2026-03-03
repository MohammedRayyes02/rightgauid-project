@extends('admin.layout.master')
@section('title','صفحة الأطباء')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

@section('content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">قائمة الأطباء</h3>
            
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('admin.doctors.create', [$department->id]) }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> إضافة طبيب جديد
                </a>
                <a href="{{ route('admin.departments.show', [$department->hospital_id, $department->id]) }}" class="btn btn-info">
                    <i class="fas fa-arrow-right"></i> العودة إلى صفحة القسم
                </a>
            </div>

            <table id="doctorsTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>صورة الطبيب</th>
                        <th>اسم الطبيب</th>
                        <th>الوصف</th>
                        <th>القسم</th>
                        <th>المستشفى</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctors as $doctor)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($doctor->doctor_img && file_exists(public_path($doctor->doctor_img)))
                                <img src="{{ asset($doctor->doctor_img) }}" alt="{{ $doctor->name }}" 
                                     class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px;">
                                    <i class="fas fa-user-md text-white"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ Str::limit($doctor->description, 50) }}</td>
                        <td>{{ $doctor->department->name ?? 'غير محدد' }}</td>
                        <td>{{ $doctor->hospital->name ?? 'غير محدد' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-sm btn-primary" 
                                   href="{{ route('admin.doctors.show', [$department->id, $doctor->id]) }}"
                                   title="عرض">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-warning" 
                                   href="{{ route('admin.doctors.edit', [$department->id, $doctor->id]) }}"
                                   title="تعديل">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.doctors.delete', [$department->id, $doctor->id]) }}" 
                                      method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger delete-btn" title="حذف">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        // تهيئة DataTable
        $('#doctorsTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/ar.json"
            },
            "responsive": true,
            "pageLength": 10,
            "order": [[0, 'asc']]
        });

        // تأكيد الحذف
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            const form = $(this).closest('form');
            
            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: "لن تتمكن من التراجع عن هذا الحذف!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'نعم، احذفه!',
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

        // عرض رسائل toastr
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    });
</script>
@endpush