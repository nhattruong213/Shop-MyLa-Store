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
                         <a href="./shop.html">Lịch sử đơn hàng</a>
                         <span>Chi tiết</span>
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
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th class="p-name">Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng đơn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($OrderDetails as $item)                             
                                        <tr>
                                            <td class="cart-pic first-row"><img style="margin-left: 30px" src="front/img/products/{{$item->product->productImages[0]->path }}" width="120px" alt=""></td>
                                            <td class="cart-title first-row">
                                                <h5>{{$item->product->name }}</h5>
                                            </td>
                                            <td class="p-price first-row">{{ $item->amount }}K</td>
                                            <td class="qua-col first-row">{{ $item->qty }}</td>
                                            <td class="total-price first-row">{{$item->total}}K</td>
                                        </tr>                              
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shopping cart section end -->


@endsection