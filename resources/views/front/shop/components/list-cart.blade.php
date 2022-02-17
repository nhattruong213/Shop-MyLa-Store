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
                    <td class="qua-col first-row">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input id="quanty-item-{{ $item['productInfo']->id }}"  type="number" required min="1" max="10" value="{{$item['quanty']}}">
                            </div>
                        </div>
                    </td>
                    <td class="close-td first-row"><i onclick="UpdateCart({{$item['productInfo']->id}})" class="ti-save"></i></td>
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
        </div>

    </div>
    <div class="col-lg-4 offset-lg-4">
        <div class="proceed-checkout">
            <ul>
                <li class="subtotal">Tổng đơn hàng <span>{{Session()->get('Cart')->totalPrice}}K</span></li>
                <li class="cart-total">Cần thanh toán <span>{{Session()->get('Cart')->totalPrice}}K</span></li>
            </ul>
            <a href="{{ route('CheckOut') }}" class="proceed-btn">Thực hiện thanh toán</a>
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