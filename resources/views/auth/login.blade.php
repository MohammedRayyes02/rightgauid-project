@extends('front.layouts.master')

@section('content')

<div class="login-area section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="login-wrapper">

                    <h3 class="text-center mb-4">تسجيل الدخول</h3>

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email"
                                   class="form-control custom-input"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autofocus
                                   placeholder="أدخل البريد الإلكتروني">

                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">كلمة المرور</label>
                            <input type="password"
                                   class="form-control custom-input"
                                   name="password"
                                   required
                                   placeholder="أدخل كلمة المرور">

                            @error('password')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label class="form-check-label" for="remember">تذكرني</label>
                        </div>

                        <!-- Submit -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn cs-btn v2">
                                تسجيل الدخول
                            </button>
                        </div>

                        <!-- Forgot Password -->
                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a href="{{ route('password.request') }}" class="forget_password">
                                    نسيت كلمة المرور؟
                                </a>
                            </div>
                        @endif

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection