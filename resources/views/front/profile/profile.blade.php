
    
   

@extends('front.layout.master')
@section('title', 'Liên hệ')
@section('body')
<!-- breadcrumb section begin -->
  <div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ route('homepage') }}"><i class="fa fa-home"></i>Trang chủ</a>
                    <span>Hồ sơ</span>
                </div>
            </div>
        </div>
    </div>
  </div>
<!-- breadcrumb section end --> 
  <section class="product-shop spad">
    <div class="container">
      <div class="col-lg-12 ">
        <div class="user-display">
          <div class="user-display-bg"><img src="front/img/profile/a.jpg" alt="Profile Background"></div>
          <div class="user-display-bottom">
            <div class="user-display-avatar"><img width="150px" height="150px" src="front/img/user/{{ Auth::user()->avatar ?? 'avatar-150.png' }}" alt="Avatar"></div>
            <div class="user-display-info">
              <div class="name">{{ Auth::user()->last_name }} <span>{{ Auth::user()->first_name }}</span></div>
              <div class="nick"><span class="mdi mdi-account"></span> {{ Auth::user()->description }}</div>
            </div>
            <div class="row user-display-details">
                        
            </div>
          </div>
        </div>
      </div>
      <div class="checkout-section spad">
        <div class="container">
        <form action="{{ route('ChangeProfile',  Auth::user()->id ) }}" method="POST" class="checkout-form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-1">

                </div>
                <div class="col-lg-10">
                      {{-- show message --}}
                      @if(Session::has('success'))
                      <p class="text-success">{{ Session::get('success') }}</p>
                      @endif

                      {{-- show error message --}}
                      @if(Session::has('error'))
                      <p class="text-danger">{{ Session::get('error') }}</p>
                      @endif
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="first_name">Họ <span>*</span></label>
                            <input type="text" id="first_name" name="first_name" value="{{ Auth::user()->first_name ?? '' }}">
                            @error('first_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="last_name">Tên <span>*</span></label>
                            <input type="text" id="last_name" name="last_name" value="{{ Auth::user()->last_name ?? '' }}">
                            @error('last_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                          <label for="postcode_zip">Zip code </label>
                          <input type="text" id="postcode_zip" name="postcode_zip" value="{{ Auth::user()->postcode_zip ?? '' }}">
                        </div>
                        <div class="col-lg-6">
                          <label for="birthday">Ngày sinh </label>
                          <input type="text" id="birthday" name="birthday" value="{{ Auth::user()->birthday ?? '' }}">
                          @error('birthday')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-lg-12">
                          <label for="avatar">Avatar </label>
                          <input type="file" id="avatar" name="avatar">
                        </div>
                        <div class="col-lg-12">
                          <label for="description">Mô tả bản thân</label>
                          <input type="text" id="description" name="description" value="{{ Auth::user()->description ?? '' }}">
                          @error('town_city')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="company_name">Công ty </label>
                            <input type="text" id="company_name" name="company_name" value="{{ Auth::user()->company_name ?? '' }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="street_address">Tên đường(địa chỉ cụ thể) <span>*</span> </label>
                            <input type="text" id="street_address" name="street_address" value="{{ Auth::user()->street_address ?? '' }}">
                            @error('street_address')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="town_city">Tỉnh, Thành phố <span>*</span> </label>
                            <input type="text" id="town_city" name="town_city" value="{{ Auth::user()->town_city ?? '' }}">
                            @error('town_city')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="email">Email <span>*</span> </label>
                            <input type="text" id="email" name="email" value="{{ Auth::user()->email ?? '' }}">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="phone">Điện thoại <span>*</span> </label>
                            <input type="text" id="phone" name="phone" value="{{ Auth::user()->phone ?? '' }}">
                            @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                          <button type="submit" class="site-btn place-order">Lưu thông tin</button>
                        </div>
                    </div>
                </div>
            </div>
        </form> 
        </div>
    </div>
    </div>
  </section>
@endsection