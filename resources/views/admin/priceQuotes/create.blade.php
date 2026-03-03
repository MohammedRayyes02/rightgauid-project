@extends('admin.layout.master')
@section('title','Create Price Quote')

@push('css')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css">
<style>
    /* تنسيق الـ Dropzone */
    #my-dropzone {
        border: 3px dashed #007bff;
        border-radius: 10px;
        padding: 30px;
        text-align: center;
        background: #f8f9fa;
        min-height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        position: relative;
    }
    
    #my-dropzone:hover {
        background: #e9ecef;
        border-color: #0056b3;
    }
    
    #my-dropzone.dz-drag-hover {
        background: #d1ecf1;
        border-color: #17a2b8;
    }
    
    /* رسالة الـ Dropzone */
    .dz-message {
        color: #495057;
        font-size: 16px;
    }
    
    .dz-message i {
        font-size: 48px;
        color: #007bff;
        margin-bottom: 10px;
        display: block;
    }
    
    .dropzone .dz-preview {
        margin: 10px;
    }
    
    .dropzone .dz-preview .dz-image {
        border-radius: 5px;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Create Price Quote for {{ $hospital->name }}</h3>
        </div>

        <form action="{{ route('admin.priceQuotes.store', $hospital->id) }}" method="POST" id="priceForm">
            @csrf
            
            <div class="card-body">
                <!-- Title -->
                <div class="form-group">
                    <label>Title *</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                           value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Suggested Department -->
                <div class="form-group">
                    <label>Suggested Department *</label>
                    <select name="suggested_department_id" class="form-control @error('suggested_department_id') is-invalid @enderror" required>
                        <option value="">- Select -</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ old('suggested_department_id') == $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('suggested_department_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Services Requested -->
                <div class="form-group">
                    <label>Services Requested *</label>
                    <select name="services_requested" class="form-control @error('services_requested') is-invalid @enderror" required>
                        <option value="">- Select -</option>
                        @foreach(App\Enum\ServicesRequest::cases() as $s)
                            <option value="{{ $s->value }}" {{ old('services_requested') == $s->value ? 'selected' : '' }}>
                                {{ $s->label() }}
                            </option>
                        @endforeach
                    </select>
                    @error('services_requested')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <!-- Last Test -->
                <div class="form-group">
                    <label>Last Test *</label>
                    <select name="last_test" class="form-control @error('last_test') is-invalid @enderror" required>
                        <option value="">- Select -</option>
                        @foreach(App\Enum\LastTest::cases() as $l)
                            <option value="{{ $l->value }}" {{ old('last_test') == $l->value ? 'selected' : '' }}>
                                {{ $l->label() }}
                            </option>
                        @endforeach
                    </select>
                    @error('last_test')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                  <div class="form-group">
                    <label>Order Status *</label>
                    <select name="order_status" class="form-control @error('order_status') is-invalid @enderror" required>
                        <option value="">- Select -</option>
                        @foreach(App\Enum\OrderStatus::cases() as $d)
                            <option value="{{ $d->value }}" {{ old('order_status',\App\Enum\OrderStatus::default()->value) == $d->value ? 'selected' : ''}}>
                                {{ $d->label() }}
                            </option>
                        @endforeach
                    </select>
                    @error('order_status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Dropzone -->
                <div class="form-group">
                    <label>Attach Files</label>
                    <div id="my-dropzone" class="dropzone">
                        <div class="dz-message">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <h4>Drop files here or click to upload</h4>
                            <p>Max file size: 10MB | Allowed: JPG, PNG, PDF, DOC, DOCX</p>
                        </div>
                    </div>
                    <small class="text-muted">You can upload up to 10 files</small>
                </div>

                <!-- Hidden inputs for uploaded files -->
                <div id="uploaded-files-container"></div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Submit
                </button>
                <a href="{{ route('admin.priceQuotes.index', $hospital->id) }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>

        </form>
    </div>
</div>
@endsection

@push('js')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// الحل: تعطيل الاكتشاف التلقائي وتهيئة Dropzone مرة واحدة فقط
Dropzone.autoDiscover = false;

// الانتظار حتى تحميل DOM بالكامل
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing Dropzone...');
    
    var dropzoneElement = document.getElementById('my-dropzone');
    
    if (!dropzoneElement) {
        console.error('Dropzone element not found!');
        return;
    }
    
    // التحقق إذا كان Dropzone مرفقاً بالفعل
    if (dropzoneElement.dropzone) {
        console.log('Dropzone already attached, destroying old instance...');
        dropzoneElement.dropzone.destroy();
    }
    
    // إعدادات Dropzone
    var dropzoneOptions = {
        url: "{{ route('admin.priceQuotes.upload', $hospital->id) }}",
        paramName: "file",
        maxFilesize: 10, // MB
        maxFiles: 10,
        acceptedFiles: ".jpg,.jpeg,.png,.pdf,.doc,.docx",
        addRemoveLinks: true,
        dictDefaultMessage: `
            <i class="fas fa-cloud-upload-alt"></i>
            <h4>Drop files here or click to upload</h4>
            <p>Max file size: 10MB | Allowed: JPG, PNG, PDF, DOC, DOCX</p>
        `,
        dictRemoveFile: "Remove",
        dictCancelUpload: "Cancel",
        clickable: true, 
        autoProcessQueue: true,
        previewsContainer: "#my-dropzone",
        createImageThumbnails: true,
        thumbnailWidth: 120,
        thumbnailHeight: 120,
        parallelUploads: 5,
        
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        
        // عند التهيئة
        init: function() {
            console.log('✅ Dropzone initialized successfully!');
            
            var myDropzone = this;
            
            // عند إضافة ملف
            this.on("addedfile", function(file) {
                console.log('File added:', file.name);
            });
            
            // عند بدء الرفع
            this.on("sending", function(file, xhr, formData) {
                console.log('Uploading:', file.name);
            });
            
            // عند نجاح الرفع
            this.on("success", function(file, response) {
                console.log('Upload success:', response);
                
                if (response.success) {
                    // إضافة hidden input للملف المرفوع
                    var hiddenInput = '<input type="hidden" name="attached_files[]" value="' + response.name + '">';
                    document.getElementById('uploaded-files-container').insertAdjacentHTML('beforeend', hiddenInput);
                    
                    // حفظ اسم الملف في كائن file للاستخدام لاحقاً
                    file.serverFileName = response.name;
                    
                    console.log('File saved:', response.name);
                } else {
                    alert('Upload failed: ' + response.message);
                    this.removeFile(file);
                }
            });
            
            // عند إزالة ملف
            this.on("removedfile", function(file) {
                console.log('File removed:', file.name);
                
                // إذا كان الملف مرفوعاً على السيرفر، نرسل طلب حذف
                if (file.serverFileName) {
                    // حذف الـ hidden input المقابل
                    $('input[name="attached_files[]"][value="' + file.serverFileName + '"]').remove();
                    
                    // إرسال طلب حذف إلى السيرفر
                    var deleteUrl = "/admin/hospitals/{{ $hospital->id }}/price-quotes/delete-file/" + encodeURIComponent(file.serverFileName);
                    
                    fetch(deleteUrl, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => console.log('File deleted from server:', data))
                    .catch(error => console.error('Delete error:', error));
                }
            });
            
            // عند حدوث خطأ
            this.on("error", function(file, errorMessage) {
                console.error('Upload error:', errorMessage);
                alert('Upload error: ' + errorMessage);
            });
            
            // عند اكتمال جميع الرفعات
            this.on("queuecomplete", function() {
                console.log('All files uploaded');
            });
        }
    };
    
    try {
        // إنشاء Dropzone
        var myDropzoneInstance = new Dropzone("#my-dropzone", dropzoneOptions);
        console.log('Dropzone instance created:', myDropzoneInstance);
        
        // إضافة اختبار يدوي (اختياري)
        addManualUploadButton();
        
    } catch (error) {
        console.error('Error creating Dropzone:', error);
        alert('Error initializing file upload: ' + error.message);
    }
    
    // دالة لإضافة زر رفع يدوي (للتجربة فقط)
    function addManualUploadButton() {
        var buttonHtml = `
            <div class="text-center mt-3">
                <button type="button" id="manual-upload-btn" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-file-upload"></i> Or click here to select files
                </button>
            </div>
        `;
        
        dropzoneElement.insertAdjacentHTML('afterend', buttonHtml);
        
        document.getElementById('manual-upload-btn').addEventListener('click', function() {
            console.log('Manual upload button clicked');
            // هذا سيفتح نافذة اختيار الملفات تلقائياً
            document.querySelector('#my-dropzone').click();
        });
    }
    
    // التحقق من صحة الفورم قبل الإرسال
    document.getElementById('priceForm').addEventListener('submit', function(e) {
        console.log('Form submission...');
        
        var isValid = true;
        var requiredFields = this.querySelectorAll('[required]');
        
        requiredFields.forEach(function(field) {
            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                isValid = false;
            } else {
                field.classList.remove('is-invalid');
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            alert('Please fill all required fields');
            return false;
        }
        
        // عرض عدد الملفات المرفوعة
        var fileCount = document.querySelectorAll('input[name="attached_files[]"]').length;
        console.log('Total files to submit:', fileCount);
        
        return true;
    });
});
</script>
@endpush