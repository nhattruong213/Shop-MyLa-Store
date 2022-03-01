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
                        <span>Đăng kí</span>
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
                    <div class="register-form">
                        <h2>Đăng kí</h2>
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="group-input">
                                <div>
                                    <x-label for="first_name" :value="__('Họ*')" />
                                    <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
                                </div>
                            </div>
                            <div class="group-input">
                                <div>
                                    <x-label for="last_name" :value="__('Tên*')" />
                                    <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus />
                                </div>
                            </div>
                            <div class="group-input">
                                <x-label for="email" :value="__('Email*')" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            </div>
                            <div class="group-input">
                                <x-label for="password" :value="__('Mật khẩu*')" />

                                <x-input id="password" class="block mt-1 w-full"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="new-password" />
                            </div>
                            <div class="group-input">
                                <x-label for="password_confirmation" :value="__('Nhập lại mật khẩu*')" />

                                <x-input id="password_confirmation" class="block mt-1 w-full"
                                                type="password"
                                                name="password_confirmation" required />
                            </div>
                            <button type="submit" class="site-btn register-btn">Đăng kí</button>
                        </form>
                        <div class="switch-login">
                            <a href="{{ route('login') }}" class="or-login">Đăng nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- register section end -->
@endsection
