@extends('front.layout.master')
@section('title', 'Liên hệ')
@section('body')
    <!-- breadcrumb section begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./home.html"><i class="fa fa-home"></i>Trang chủ</a>
                        <a href="./shop.html">Shop</a>
                        <span>Thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb section end --> 

    <!-- shopping cart section begin -->
    <div class="checkout-section spad">
        <div class="container">
        <form action="{{ route('addOrder') }}" method="POST" class="checkout-form">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <h4>Chi tiết hóa đơn</h4>
                    <div class="row">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? null }}">
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
                        <div class="col-lg-12">
                            <label for="company_name">Công ty </label>
                            <input type="text" id="company_name" name="company_name" value="{{ Auth::user()->company_name ?? '' }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="country">Quốc gia <span>*</span> </label>
                            <input type="text" id="country" name="country" value="{{ Auth::user()->country ?? 'Việt Nam' }}">
                            @error('country')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="street_address">Tên đường(địa chỉ cụ thể) <span>*</span> </label>
                            <input type="text" id="street_address" name="street_address" value="{{ Auth::user()->street_address ?? '' }}">
                            @error('street_address')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="postcode_zip">Zip code </label>
                            <input type="text" id="postcode_zip" name="postcode_zip" value="{{ Auth::user()->postcode_zip ?? '' }}">
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
                        <div class="col-lg-12">
                        <div class="create-item">
                            <label for="acc-create">
                                Tạo một tài khoản?
                                <input type="checkbox" id="acc-create">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        </div>

                </div>
                </div>
                <div class="col-lg-6">
                    <div class="place-order">
                        <h4>Đơn hàng của bạn</h4>
                        <div class="order-total">
                            @if(Session()->has('Cart'))
                            <ul class="order-table">
                                <li>Sản phẩm <span>Tổng</span></li>
                                @foreach (Session()->get('Cart')->products as $item)
                                    <li class="fw-normal">{{$item['productInfo']->name }} × {{ $item['quanty'] }} <span>{{ number_format($item['price']) }}</span></li>
                                @endforeach 
                                <li class="fw-normal">Tổng <span>{{ number_format(Session()->get('Cart')->totalPrice) }}</span></li>
                                <li class="total-price">Tổng thanh toán <span>{{ number_format(Session()->get('Cart')->totalPrice) }}</span></li>
                            </ul>
                            <div class="payment-check">
                                    <input type="hidden" name="status" value="0">
                                    <input type="hidden" name="subtotal" value="{{Session()->get('Cart')->totalPrice}}">
                                    <div class="pc-item">
                                    <label for="pc-check">
                                        Thanh toán khi nhận hàng
                                        <input type="radio" id="pc-check" name="payment_type" value="pay_later" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                    </div>
                                    <div class="pc-item">
                                    <label for="pc-paypal">
                                        Thanh toán online
                                        <input type="radio" id="pc-paypal" name="payment_type" value="online_payment">
                                        <span class="checkmark"></span>
                                    </label>
                                    </div>
                                    
                            </div>
                            <div class="order-btn">
                                {{-- <button type="submit" class="site-btn place-order">Đặt hàng</button> --}}
                                <button type="submit" name="redirect" class="site-btn place-order">Đặt hàng</button>
                            </div>
                      
                            @else
                                @if(Session::has('success'))
                                <p class="text-success">{{ Session::get('success') }}</p>
                                @endif
                                <div class="order-btn">
                                    <a href="{{route('shop')}}" class="primary-btn continue-shop">Mua sắm tiếp </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form> 
        </div>
        {{-- <form action="{{ route('Payment_online') }}" method="POST">
            @csrf
            <button type="submit" name="redirect">Online </button>
        </form> --}}
    </div>
    <!-- shopping cart section end -->
@endsection