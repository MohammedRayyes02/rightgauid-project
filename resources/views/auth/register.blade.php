@extends('front.layouts.master')
@section('title','إنشاء حساب')
@section('content')
<div class="body-content">
    <div class="login-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="content">
                        <div class="login-card">
                            <h1>تسجيل حساب جديد</h1>
                            <h6>أدخل البيانات الشخصية الخاصة بك أدناه</h6>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <!-- الاسم كامل -->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="name" class="col-form-label">الاسم كاملا:</label>
                                            <div class="icon-input">
                                                <span class="icon-i">
                                                    <!-- أيقونة الاسم هنا -->
                                                </span>
                                                <input type="text" class="form-control custom-input" id="name" name="name" placeholder="أدخل الاسم رباعي" value="{{ old('name') }}" required autofocus>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- البريد الإلكتروني -->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="email" class="col-form-label">البريد الإلكتروني:</label>
                                            <div class="icon-input">
                                                <span class="icon-i">
                                                    <!-- أيقونة البريد هنا -->
                                                </span>
                                                <input type="email" class="form-control custom-input" id="email" name="email" placeholder="أدخل البريد الإلكتروني" value="{{ old('email') }}" required>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- رقم الجوال -->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="phone" class="col-form-label">رقم الجوال:</label>
                                            <div class="icon-input">
                                                <span class="icon-i">
                                                    <!-- أيقونة الجوال هنا -->
                                                </span>
                                                <input type="text" class="form-control custom-input" id="phone" name="phone" placeholder="أدخل رقم الجوال" value="{{ old('phone') }}" required>
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- الدولة -->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="country" class="col-form-label">اختر الدولة:</label>
                                            <div class="icon-input">
                                                <span class="icon-i">
                                                    <!-- أيقونة الموقع هنا -->
                                                </span>
                                               
                                            </div>
                                        </div>
                                    </div>

                                    <!-- كلمة المرور -->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="password" class="col-form-label">كلمة المرور:</label>
                                            <div class="icon-input">
                                                <span class="icon-i">
                                                    <!-- أيقونة القفل -->
                                                </span>
                                                <input type="password" class="form-control custom-input" id="password" name="password" placeholder="أدخل كلمة المرور" required autocomplete="new-password">
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <span class="icon-i-2 cursor-pointer">
                                                    <!-- أيقونة إظهار كلمة المرور -->
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- تأكيد كلمة المرور -->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="col-form-label">تأكيد كلمة المرور:</label>
                                            <div class="icon-input">
                                                <span class="icon-i">
                                                    <!-- أيقونة القفل -->
                                                </span>
                                                <input type="password" class="form-control custom-input" id="password_confirmation" name="password_confirmation" placeholder="أعد إدخال كلمة المرور" required autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- شروط الاستخدام -->
                                    <div class="col-lg-12 d-flex justify-content-between">
                                        <h6>بالتسجيل، أنت توافق على الشروط والأحكام وسياسة الخصوصية</h6>
                                    </div>

                                    <!-- زر إنشاء الحساب -->
                                    <div class="col-lg-12 mt-3">
                                        <button type="submit" class="mx-auto w-100 btn cs-btn v2">إنشاء حساب</button>
                                    </div>

                                    <!-- رابط تسجيل الدخول -->
                                    <div class="col-lg-12 text-center mt-4">
                                        <span class="font400 font-14 black-color">لديك حساب بالفعل؟</span>
                                        <a href="{{ route('login') }}" class="forget_password">تسجيل الدخول</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Slider / صور جانبية -->
                <div class="col-lg-5 offset-2">
                    <div class="content content-left d-lg-block d-none">
                        <div class="owl-carousel login-slider owl-slider">
                            <div class="login-card-slider">
                                <figure>
                                    <img src="assets/images/login-img-slider.svg" alt="">
                                </figure>
                                <h2>أفضل المستشفيات</h2>
                                <p>نحرص على اختيار أفضل المستشفيات في تركيا، الحاصلة على شهادات الجودة بالمعايير العالية للخدمات الطبية</p>
                            </div>
                            <div class="login-card-slider">
                                <figure>
                                    <img src="assets/images/login-slider-img-1.png" alt="">
                                </figure>
                                <h2>أفضل المستشفيات</h2>
                                <p>نحرص على اختيار أفضل المستشفيات في تركيا، الحاصلة على شهادات الجودة بالمعايير العالية للخدمات الطبية</p>
                            </div>
                            <div class="login-card-slider">
                                <figure>
                                    <img src="assets/images/login-img-slider.svg" alt="">
                                </figure>
                                <h2>أفضل المستشفيات</h2>
                                <p>نحرص على اختيار أفضل المستشفيات في تركيا، الحاصلة على شهادات الجودة بالمعايير العالية للخدمات الطبية</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection