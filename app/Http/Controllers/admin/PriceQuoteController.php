<?php

namespace App\Http\Controllers\admin;

use App\Enum\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\PriceQuote;
use App\Models\PriceQuoteFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PriceQuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Hospital $hospital)
    {
        $priceQuotes = $hospital->priceQuotes()->with('files')->get();
        return view('admin.priceQuotes.index', compact('hospital', 'priceQuotes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Hospital $hospital)
    {

        $departments = $hospital->departments;
        return view('admin.priceQuotes.create', compact('hospital','departments'));
    }

    /**
     * Handle file upload via Dropzone
     */
    public function upload(Request $request, Hospital $hospital)
    {
        try {
            $request->validate([
                'file' => 'required|file|max:10240'
            ]);

            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            
            // إنشاء اسم فريد مع الحفاظ على الامتداد
            $fileName = uniqid() . '_' . time() . '.' . $extension;
            
            // حفظ الملف في المجلد العام
            $file->move(public_path('uploads/price-quotes'), $fileName);
            
            return response()->json([
                'success' => true,
                'name' => $fileName,
                'original_name' => $originalName,
                'path' => 'uploads/price-quotes/' . $fileName,
                'url' => asset('uploads/price-quotes/' . $fileName)
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Hospital $hospital)
    {
        DB::beginTransaction();
        
       
       
       
       
        try {
            $request->validate([
                'title' => 'required|max:255',
                'suggested_department_id' => 'required|exists:departments,id',
                'services_requested' => 'required',
                'last_test' => 'required',
                'attached_files' => 'nullable|array',
            ]);

            // إنشاء Price Quote
         
         
         
            $pricequote = PriceQuote::create([
                'title' => $request->title,
                'suggested_department_id' => $request->suggested_department_id,
                'services_requested' => $request->services_requested,
                'last_test' => $request->last_test,
                'order_status' =>$request->order_status ?? OrderStatus::default(),
                'hospital_id' => $hospital->id,
                'patient_id' => $hospital->patient_id
            
                ]);

         
                // حفظ الملفات إذا وجدت
            if ($request->has('attached_files') && is_array($request->attached_files)) {
                foreach ($request->attached_files as $fileName) {
                    $path = 'uploads/price-quotes/' . $fileName;
                    
                    // التأكد من وجود الملف فعلياً
                    if (file_exists(public_path($path))) {
                        $pricequote->files()->create([
                            'path' => $path,
                            'original_name' => $fileName
                        ]);
                    }
                }
            }

            DB::commit();
            
            return redirect()->route('admin.priceQuotes.index', $hospital->id)
                ->with('success', 'Price Quote created successfully');
                
        } catch (\Exception $e) {
            DB::rollBack();
            
            return back()
                ->withInput()
                ->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Hospital $hospital, PriceQuote $pricequote)
    {
        $pricequote->load('files');
        return view('admin.priceQuotes.show', compact('hospital', 'pricequote'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hospital $hospital, PriceQuote $pricequote)
    {
     
    $departments = $hospital->departments;
        $pricequote->load('files');
        return view('admin.priceQuotes.edit', compact('hospital','departments', 'pricequote'));
    }

    /**
     * Update the specified resource in storage.
     */
    /**
 * Update the specified resource in storage.
 */
public function update(Request $request, Hospital $hospital , PriceQuote $pricequote)
{
    $request->validate([
        'title' => ['required', 'max:255'],
        'suggested_department_id' => ['required', 'exists:departments,id'],
        'services_requested' => ['required', 'string'],
        'last_test' => ['required', 'string'],
        'files_to_delete' => ['nullable', 'array'],
        'files_to_delete.*' => ['exists:price_quote_files,id'],
        'new_attached_files' => ['nullable', 'array'],
    ]);

    DB::beginTransaction();
    
    try {
        // تحديث البيانات الأساسية
        $pricequote->update([
            'title' => $request->title,
            'suggested_department' => $request->suggested_department_id,
            'services_requested' => $request->services_requested,
            'last_test' => $request->last_test,
            'patient_id'=> $hospital->patient_id
       
            ]);

        // حذف الملفات المحددة
        if ($request->has('files_to_delete')) {
            foreach ($request->files_to_delete as $fileId) {
                $file = PriceQuoteFile::find($fileId);
                if ($file) {
                    // حذف الملف من السيرفر
                    if (file_exists(public_path($file->path))) {
                        unlink(public_path($file->path));
                    }
                    // حذف السجل من قاعدة البيانات
                    $file->delete();
                }
            }
        }

        // إضافة ملفات جديدة
        if ($request->has('new_attached_files')) {
            foreach ($request->new_attached_files as $fileName) {
                $path = 'uploads/price-quotes/' . $fileName;
                
                if (file_exists(public_path($path))) {
                    $pricequote->files()->create([
                        'path' => $path,
                        'original_name' => $fileName
                    ]);
                }
            }
        }

        DB::commit();
        
        return redirect()->route('admin.priceQuotes.index', $hospital->id)
            ->with('success', 'Price quote updated successfully!');
            
    } catch (\Exception $e) {
        DB::rollBack();
        
        return redirect()->back()
            ->withInput()
            ->with('error', 'Update failed: ' . $e->getMessage());
    }
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hospital $hospital, PriceQuote $pricequote)
    {
        try {
            // حذف جميع الملفات المرتبطة
            foreach ($pricequote->files as $file) {
                if (file_exists(public_path($file->path))) {
                    unlink(public_path($file->path));
                }
                $file->delete();
            }
            
            // حذف الـ Price Quote
            $pricequote->delete();
            
            return redirect()->route('admin.priceQuotes.index', $hospital->id)
                ->with('success', 'Price Quote deleted successfully');
                
        } catch (\Exception $e) {
            return redirect()->route('admin.priceQuotes.index', $hospital->id)
                ->with('error', 'Delete failed: ' . $e->getMessage());
        }
    }

    /**
     * Delete temporary file
     */
    public function deleteFile(Request $request, $filename)
    {
        try {
            $path = public_path('uploads/price-quotes/' . $filename);
            
            if (file_exists($path)) {
                unlink($path);
                return response()->json(['success' => true]);
            }
            
            return response()->json(['success' => false, 'message' => 'File not found']);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}