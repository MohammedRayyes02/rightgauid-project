@extends('admin.layout.master')
@section('title','Edit Price Quote')

@push('css')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css">
<style>
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
    
    .existing-files {
        border: 1px solid #dee2e6;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 20px;
    }
    
    .file-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        border-bottom: 1px solid #eee;
    }
    
    .file-item:last-child {
        border-bottom: none;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Price Quote</h3>
        </div>

        <form action="{{ route('admin.priceQuotes.update', [$hospital->id,  $pricequote->id]) }}" method="POST" id="priceForm">
            @csrf
            @method('PUT')
            
            <div class="card-body">
                <!-- Title -->
                <div class="form-group">
                    <label for="title">Title *</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                           id="title" name="title" value="{{ old('title',  $pricequote->title) }}" 
                           placeholder="Enter a Title for priceQuote" required>
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
                            <option value="{{ $department->id }}" {{ old('suggested_department_id',$department->id) == $department->id ? 'selected' : '' }}>
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
                    @foreach (App\Enum\ServicesRequest::cases() as $services_requested)
                      <option value="{{  $services_requested->value }}" 
                        {{ old('services_requested', $pricequote->services_requested->value ?? '') == $services_requested->value ? 'selected' : '' }}>
                          {{$services_requested->label() }}
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
                        @foreach (App\Enum\LastTest::cases() as $last_test)
                          <option value="{{ $last_test->value }}" 
                            {{ old('last_test', $pricequote->last_test->value ?? '') == $last_test->value ? 'selected' : '' }}>
                            {{ $last_test->label() }}
                           </option>
@endforeach
                    </select>
                    @error('last_test')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Existing Files -->
                @if( $pricequote->files &&  $pricequote->files->count() > 0)
                <div class="form-group">
                    <label>Existing Files</label>
                    <div class="existing-files">
                        @foreach ( $pricequote->files as $file)
                        <div class="file-item">
                            <div>
                                <input type="checkbox" class="form-check-input" name="files_to_delete[]" 
                                       value="{{ $file->id }}" id="file_{{ $file->id }}">
                                <label class="form-check-label ml-2" for="file_{{ $file->id }}">
                                    <a href="{{ asset($file->path) }}" target="_blank" class="text-primary">
                                        <i class="fas fa-file mr-1"></i>
                                        {{ basename($file->path) }}
                                    </a>
                                </label>
                            </div>
                            <small class="text-muted">
                                {{ \Carbon\Carbon::parse($file->created_at)->format('Y-m-d H:i') }}
                            </small>
                        </div>
                        @endforeach
                    </div>
                    <small class="text-muted">Check files you want to delete</small>
                </div>
                @endif
                
                <!-- New Files Dropzone -->
                <div class="form-group">
                    <label>Add New Files</label>
                    <div id="my-dropzone" class="dropzone">
                        <div class="dz-message">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <h4>Drop new files here or click to upload</h4>
                            <p>Max file size: 10MB | Allowed: JPG, PNG, PDF, DOC, DOCX</p>
                        </div>
                    </div>
                    <small class="text-muted">You can upload up to 10 additional files</small>
                </div>

                <!-- Hidden inputs for new uploaded files -->
                <div id="uploaded-files-container"></div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
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
    console.log('DOM loaded, initializing Dropzone for edit...');
    
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
            <h4>Drop new files here or click to upload</h4>
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
            console.log('✅ Dropzone initialized successfully for edit!');
            
            var myDropzone = this;
            
            // عند إضافة ملف
            this.on("addedfile", function(file) {
                console.log('New file added:', file.name);
            });
            
            // عند بدء الرفع
            this.on("sending", function(file, xhr, formData) {
                console.log('Uploading new file:', file.name);
            });
            
            // عند نجاح الرفع
            this.on("success", function(file, response) {
                console.log('Upload success:', response);
                
                if (response.success) {
                    // إضافة hidden input للملف الجديد
                    var hiddenInput = '<input type="hidden" name="new_attached_files[]" value="' + response.name + '">';
                    document.getElementById('uploaded-files-container').insertAdjacentHTML('beforeend', hiddenInput);
                    
                    // حفظ اسم الملف في كائن file للاستخدام لاحقاً
                    file.serverFileName = response.name;
                    
                    console.log('New file saved:', response.name);
                } else {
                    alert('Upload failed: ' + response.message);
                    this.removeFile(file);
                }
            });
            
            // عند إزالة ملف
            this.on("removedfile", function(file) {
                console.log('New file removed:', file.name);
                
                // إذا كان الملف مرفوعاً على السيرفر، نرسل طلب حذف
                if (file.serverFileName) {
                    // حذف الـ hidden input المقابل
                    $('input[name="new_attached_files[]"][value="' + file.serverFileName + '"]').remove();
                    
                    // إرسال طلب حذف إلى السيرفر
                    var deleteUrl = "/admin/hospitals/{{$hospital->id }}/price-quotes/delete-file/" + encodeURIComponent(file.serverFileName);
                    
                    fetch(deleteUrl, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => console.log('New file deleted from server:', data))
                    .catch(error => console.error('Delete error:', error));
                }
            });
            
            // عند حدوث خطأ
            this.on("error", function(file, errorMessage) {
                console.error('Upload error:', errorMessage);
                alert('Upload error: ' + errorMessage);
            });
        }
    };
    
    try {
        // إنشاء Dropzone
        var myDropzoneInstance = new Dropzone("#my-dropzone", dropzoneOptions);
        console.log('Dropzone instance created for edit:', myDropzoneInstance);
        
    } catch (error) {
        console.error('Error creating Dropzone:', error);
        alert('Error initializing file upload: ' + error.message);
    }
    
    // التحقق من صحة الفورم قبل الإرسال
    document.getElementById('priceForm').addEventListener('submit', function(e) {
        console.log('Edit form submission...');
        
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
        
        // عرض عدد الملفات الجديدة المرفوعة
        var newFileCount = document.querySelectorAll('input[name="new_attached_files[]"]').length;
        console.log('New files to add:', newFileCount);
        
        // عرض عدد الملفات المراد حذفها
        var deleteFiles = document.querySelectorAll('input[name="files_to_delete[]"]:checked');
        console.log('Files to delete:', deleteFiles.length);
        
        return true;
    });
});
</script>
@endpush