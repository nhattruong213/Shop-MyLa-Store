<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckOutRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use session;

class CheckOutController extends Controller
{
    public function index ()
    {
        //lấy dữ liệu danh mục
        $categories = ProductCategory::where('status','1')->get();
        $data['categories'] = $categories;
        return view('front.checkout.index', $data);
    }
    public function addOrder(CheckOutRequest $request) 
    {
        if($request->payment_type == "pay_later")  // xử lí thanh toán sau gửi email thông báo 
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

                // trừ tồn kho
                $product = Product::findOrFail($item['productInfo']->id);
                $product->qty -= $item['quanty'];
                $product->save();

            }
                 
            // gửi mail
            $subtotal = Session()->get('Cart')->totalPrice;
            $this->sendEmail($order, $subtotal ) ;
            // xóa session 
            $request->session()->forget('Cart');
     
            // trả về kết quả
            return redirect()->back()
            ->with('success', 'Đặt hàng thành công, quý khách vui lòng check mail, chú ý điện thoại để nhận hàng.');
            
        }
        else   // thanh toán online
        {
            return "Sorry, online payment is not supported";
        }
    }
    private function sendEmail($order, $subtotal){
        $data = [];

        if($subtotal >= 199) {
            $feeShip = 0;
        } else {
            $feeShip = 40;
        }

        $data['feeShip'] = $feeShip;
        $data['order'] = $order;
        $data['subtotal'] = $subtotal;
        $email_to = $order->email;
        Mail::send('front.checkout.mail',$data, function($message) use ($email_to){
            $message->from('nguyennhattruong11223344@gmail.com', 'MylaStore');
            $message->to($email_to, $email_to);
            $message->subject('Thông báo đơn đặt hàng từ MyLaStore ');
        });
    }
}
