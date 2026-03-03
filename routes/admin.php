<?php

use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\HospitalController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\admin\OfferController;
use App\Http\Controllers\admin\PriceQuoteController;
use App\Http\Controllers\admin\PatientController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->prefix('/admin')->name('admin.')->group(function(){
  
    
  
   Route::prefix('/hospitals')->controller(HospitalController::class)->name('hospitals.')->group(function(){
      
      Route::get('/index','index')->name('index');
      Route::get('/create','create')->name('create');  
      Route::post('/store','store')->name('store');
      Route::get('/edit/{hospital}','edit')->name('edit');
      Route::put('/update/{hospital}','update')->name('update');
      Route::get('/show/{hospital}','show')->name('show');
      Route::delete('/delete/{hospital}','destroy')->name('delete');
    });
    
   Route::prefix('hospitals/{hospital}/departments')->controller(DepartmentController::class)->name('departments.')
   ->group(function(){ 
      Route::get('/index','index')->name('index');
      Route::get('/create','create')->name('create');  
      Route::post('/store','store')->name('store');
      Route::get('/edit/{department}','edit')->name('edit'); 
      Route::put('/update/{department}','update')->name('update');
      Route::get('/show/{department}','show')->name('show');
      Route::delete('/delete/{department}','destroy')->name('delete');
   });
  
  
  
  Route::prefix('departments/{department}/doctors')->controller(DoctorController::class)->name('doctors.')
   ->group(function(){
      Route::get('/index','index')->name('index');
      Route::get('/create','create')->name('create');  
      Route::post('/store','store')->name('store');
      Route::get('/edit/{doctor}','edit')->name('edit');
      Route::put('/update/{doctor}','update')->name('update');
      Route::get('/show/{doctor}','show')->name('show');
      Route::delete('/delete/{doctor}','destroy')->name('delete');
   });
  
 
 Route::prefix('departments/{department}/patients')->controller(PatientController::class)->name('patients.')->group(function(){
      
      Route::get('/index','index')->name('index');
      Route::get('/create','create')->name('create');  
      Route::post('/store','store')->name('store');
      Route::get('/edit/{patient}','edit')->name('edit');
      Route::put('/update/{patient}','update')->name('update');
      Route::get('/show/{patient}','show')->name('show');
      Route::delete('/delete/{patient}','destroy')->name('delete');
    });

 
 
 
   Route::prefix('hospitals/{hospital}/priceQuotes')->controller(PriceQuoteController::class)->name('priceQuotes.')->group(function(){
      Route::get('/index','index')->name('index');
      Route::get('/create','create')->name('create');  
      Route::post('/store','store')->name('store');
      Route::get('/edit/{pricequote}','edit')->name('edit');
      Route::put('/update/{pricequote}','update')->name('update');
      Route::get('/show/{pricequote}','show')->name('show');
      Route::delete('/delete/{pricequote}','destroy')->name('delete');
      Route::post('/upload-file', 'upload')->name('upload');
      Route::delete('/delete-file/{filename}','deleteFile')->name('deleteFile');
 
      });
  
    Route::prefix('departments/{department}/blogs')->controller(BlogController::class)->name('blogs.')->group(function(){
      Route::get('/index','index')->name('index');
      Route::get('/create','create')->name('create');  
      Route::post('/store','store')->name('store');
      Route::get('/edit/{blog}','edit')->name('edit');
      Route::put('/update/{blog}','update')->name('update');
      Route::get('/show/{blog}','show')->name('show');
      Route::delete('/delete/{blog}','destroy')->name('delete');
      
      });
  
  
   
   Route::prefix('hospitals/{hospital}/offers')->controller(OfferController::class)->name('offers.')->group(function(){
      Route::get('/index','index')->name('index');
      Route::get('/create','create')->name('create');  
      Route::post('/store','store')->name('store');
      Route::get('/edit/{offer}','edit')->name('edit');
      Route::put('/update/{offer}','update')->name('update');
      Route::get('/show/{offer}','show')->name('show');
      Route::delete('/delete/{offer}','destroy')->name('delete');
      
      });
  
  
  
  
      });




