@extends('front.layout.master')
@section('title', 'Giỏ hàng')
@section('body')

    <!-- breadcrumb section begin -->
      <div class="breadcrumb-section">
        <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="breadcrumb-text">
                         <a href="./home.html"><i class="fa fa-home"></i>Trang chủ</a>
                         <a href="./shop.html">Shop</a>
                         <span>Giỏ hàng</span>
                     </div>
                 </div>
             </div>
        </div>
    </div>
    <!-- breadcrumb section end --> 
    

    <!-- shopping cart section begin -->
    <div class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" id="list-cart">
                    @if(Session()->has('Cart'))
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th class="p-name">Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Cập nhật</th>
                                        <th>Tổng đơn</th>
                                        <th><i onclick=" confirm('Bạn có chắc chắn xóa tất cả?') === true ? window.location='./Cart/DeleteAllCart' : '' " class="ti-close"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Session()->get('Cart')->products as $item)                             
                                        <tr>
                                            <td class="cart-pic first-row"><img style="margin-left: 30px" src="front/img/products/{{$item['productInfo']->productImages[0]->path }}" width="120px" alt=""></td>
                                            <td class="cart-title first-row">
                                                <h5>{{$item['productInfo']->name }}</h5>
                                            </td>
                                            <td class="p-price first-row">{{$item['productInfo']->discount != null ? $item['productInfo']->discount : $item['productInfo']->price }}K</td>
                                            <form action="{{ route('UpdateItemCart', $item['productInfo']->id ) }}" method="POST">
                                            @csrf
                                            <td class="qua-col first-row">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input name="quanty"  type="number" required min="1" max="10" value="{{$item['quanty']}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-price first-row"><Button class="primary-btn up-cart" type="submit">Cập nhật</Button></td>
                                            </form>
                                            <td class="total-price first-row">{{$item['price']}}K</td>
                                            <td class="close-td first-row"><i class="ti-close" onclick="DeleteListCart({{$item['productInfo']->id}})"></i></td>
                                        </tr>                              
                                    @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="cart-buttons">
                                    <a href="{{route('shop')}}" class="primary-btn continue-shop">Mua sắm tiếp </a>
                                    {{-- <a href="#" class="primary-btn up-cart">Cập nhật giỏ hàng</a> --}}
                                </div>
                            </div>
                            <div class="col-lg-4 offset-lg-4">
                                <div class="proceed-checkout">
                                    <ul>
                                        <li class="subtotal">Tổng đơn hàng <span>{{Session()->get('Cart')->totalPrice}}K</span></li>
                                        <li class="cart-total">Cần thanh toán <span>{{Session()->get('Cart')->totalPrice}}K</span></li>
                                    </ul>
                                    <a href="check-out.html" class="proceed-btn">Thực hiện thanh toán</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <h3 style="text-align: center;">Giỏ hàng của bạn trống</h3>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="cart-buttons">
                                    <a href="{{route('shop')}}" class="primary-btn continue-shop">Mua sắm tiếp </a>
                                </div>

                            </div>
                        </div>
                    @endif         
                </div>
            </div>
        </div>
    </div>
    <!-- shopping cart section end -->


@endsection