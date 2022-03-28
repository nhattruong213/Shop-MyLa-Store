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
                         <span>Lịch sử mua hàng</span>
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
                   {{-- show message --}}
                   @if(Session::has('success'))
                   <p class="text-success">{{ Session::get('success') }}</p>
                   @endif

                   {{-- show error message --}}
                   @if(Session::has('error'))
                   <p class="text-danger">{{ Session::get('error') }}</p>
                   @endif
                <div class="col-lg-12" id="list-cart">
                    @if(!empty($orders))
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Đơn hàng</th>
                                        <th class="p-name" >Ngày đặt</th>
                                        <th>Chi tiết</th>
                                        <th>Trạng thái</th>
                                        <th>Tổng tiền</th>
                                        <th>Hủy đơn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)                             
                                        <tr>
                                            <td class="cart-pic first-row">{{ $order->id }}</td>
                                            <td class="cart-title first-row">
                                                {{ $order->created_at }}
                                            </td>
                                            <td class="p-price first-row"><a href="{{ route('ViewOrderDetail', $order->id) }}">Xem</a></td>
                                            <td class="qua-col first-row">{{ $order->status == 0 ? 'Đang chờ' : ($order->status == 1 ? 'Đang giao' : 'Hoàn thành') }}</td>
                                            <td class="close-td first-row">{{ number_format($order->subtotal,3)  }}</td>
                                            <td class="close-td first-row"><i onclick=" confirm('Bạn có chắc muốn hủy đơn hàng?') === true ? window.location='{{ route('returnOrder',$order->id ) }}' : '' " class="ti-close"></i></td>
                                        </tr>                              
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h3 style="text-align: center;">Không có lịch sử đơn hàng nào</h3>
                    @endif         
                </div>
            </div>
        </div>
    </div>
    <!-- shopping cart section end -->


@endsection