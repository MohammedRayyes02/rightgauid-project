<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/front-profile', fn()=>view('front-profile'))
    ->middleware('auth')
    ->name('front-profile');

// Route::get('/hospital-details', function () {
//     return view('front.hospital-details');
// });
Route::get('/' , [HomeController::class , 'home'])->name('front.home');
Route::get('/hospitals' , [HomeController::class , 'hospitals'])->name('front.hospitals');
Route::get('/about-us' , [HomeController::class , 'aboutUs'])->name('front.aboutUs');
Route::get('/hospital-details' , [HomeController::class , 'hospitalDetails'])->name('front.hospitalDetails');
Route::get('/order',[HomeController::class, 'order'])->name('front.order');
Route::get('/service-details' , [HomeController::class , 'servicesDetails'])->name('front.servicesDetails');
Route::get('/blog',[HomeController::class, 'blog'])->name('front.blog');
Route::get('/blog-details',[HomeController::class, 'blogDetails'])->name('front.blog-details');
Route::get('/contact-us',[HomeController::class, 'contactUs'])->name('front.contact-us');
Route::get('/frontlogin',[HomeController::class, 'login'])->name('front.login');
Route::get('/forget-password',[HomeController::class, 'forgetPassword'])->name('front.forget-password');
Route::get('/front-register',[HomeController::class, 'register'])->name('front.register');
Route::get('/front-profile',[HomeController::class, 'profile'])->name('front.profile');
Route::get('/request-details',[HomeController::class, 'requestDetails'])->name('front.request-details');
Route::get('/user-info',[HomeController::class, 'userInfo'])->name('front.user-info');
Route::get('/policies',[HomeController::class, 'policies'])->name('front.policies');
Route::get('/privacy',[HomeController::class, 'privacy'])->name('front.privacy');

require __DIR__.'/auth.php';
