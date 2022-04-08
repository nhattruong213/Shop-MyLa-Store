@if(Session()->has('Cart'))
<div class="select-items">
    <table>
        <tbody>
            @foreach (Session()->get('Cart')->products as $item)
            <tr>
                <td class="si-pic"><img src="front/img/products/{{$item['productInfo']->productImages[0]->path}}" width="50px" alt=""></td>
                <td class="si-text">
                    <div class="product-selected">
                        <p>{{$item['productInfo']->discount != null ? number_format($item['productInfo']->discount) : number_format($item['productInfo']->price) }} × {{$item['quanty']}}</p>
                        <h6>{{$item['productInfo']->name}}</h6>
                    </div>
                </td>
                <td class="si-close">
                    <i class="ti-close" data-id="{{ $item['productInfo']->id }}"></i>
                </td>
            </tr>
                            
            @endforeach
        </tbody>
    </table>
</div>
<div class="select-total">
    <span>Tổng thanh toán:</span>
    <h5>{{ number_format(Session()->get('Cart')->totalPrice) }}</h5>
    <input type="hidden" id="total-quanty" value="{{Session()->get('Cart')->totalQuanty}}">
</div>
@endif  