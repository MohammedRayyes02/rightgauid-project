<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hospital-details', function () {
    return view('front.hospital-details');
});
Route::get('/' , [HomeController::class , 'home'])->name('front.home');
Route::get('/hospitals' , [HomeController::class , 'hospitals'])->name('front.hospitals');
Route::get('/about-us' , [HomeController::class , 'aboutUs'])->name('front.aboutUs');
Route::get('/hospital-details' , [HomeController::class , 'hospitalDetails'])->name('front.hospitalDetails');