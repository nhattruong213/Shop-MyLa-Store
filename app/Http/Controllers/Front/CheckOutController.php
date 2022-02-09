<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;
use session;

class CheckOutController extends Controller
{
    public function index ()
    {
        //lấy dữ liệu danh mục
        $categories = ProductCategory::get();
        $data['categories'] = $categories;
        return view('front.checkout.index', $data);
    }
    public function addOrder(Request $request) 
    {
        // thêm đơn hàng
            $order = Order::create($request->all());

        //thêm đơn hàng chi tiết
            foreach(Session()->get('Cart')->products as $item){
                $dataSave = [
                    'order_id' => $order->id,
                    'product_id' => $item['productInfo']->id,
                    'qty' => $item['quanty'],
                    'amount'=> $item['productInfo']->discount != null ? $item['productInfo']->discount : $item['productInfo']->price,
                    'total' => $item['price'],
                ];
                OrderDetail::create($dataSave);
            }
        // xóa session 
        $request->session()->forget('Cart');

        // trả về kết quả
        return redirect()->back()
        ->with('success', 'Đặt hàng thành công, quý khách vui lòng chú ý điện thoại để nhận hàng.');
       
    }
}
