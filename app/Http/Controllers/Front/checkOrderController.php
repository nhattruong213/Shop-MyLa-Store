<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class checkOrderController extends Controller
{
    public function view(Request $request) {
        return view('front.checkOrder.index');
    }
    public function SearchView(Request $request) {
        $data = [];
        $search = $request->search ?? '';
        $order = Order::where('id',$search)->get();

        $orderDetail = OrderDetail::where('order_id', $search)->get();
        // dd($orderDetail);
        $data['orderDetail'] = $orderDetail;
        $data['order'] = $order;
        return view('front.checkOrder.index', $data);
    }
}
