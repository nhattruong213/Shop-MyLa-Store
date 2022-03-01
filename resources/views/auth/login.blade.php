@extends('front.layout.master')
@section('title', 'HomePage')
@section('body')
    <!-- breadcrumb section begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./home.html"><i class="fa fa-home"></i>Trang chủ</a>
                        <span>Đăng nhập</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb section end --> 

    <!-- register section begin -->
    <div class="rigister-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        
                        <h2>Đăng nhập</h2>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                        
                            <!-- Email Address -->
                            <div class="group-input">
                                <x-label for="email" :value="__('Tên tài khoản hoặc email*')" />
                        
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                            </div>
                            <!-- Password -->
                            <div class="group-input">
                                <x-label for="password" :value="__('Mật khẩu*')" />
                        
                                <x-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                required autocomplete="current-password" />
                            </div>
                            <!-- Remember Me -->
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="remember_me" class="inline-flex items-center">
                                        Lưu mật khẩu
                                        <input id="remember_me" type="checkbox"  name="remember">
                                        <span class="checkmark"></span>
                                    </label>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="forget-pass">Quên mật khẩu?</a>
                                        @endif
                                </div>
                            </div>
                            <button type="submit" class="site-btn login-btn">Đăng nhập</button>
                        </form>
                        <div class="switch-login">
                            <a href="{{route('register')}}" class="or-login">Tạo 1 tài khoản mới?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- register section end -->
@endsection