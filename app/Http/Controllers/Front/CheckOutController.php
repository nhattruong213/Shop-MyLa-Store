<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckOutRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use session;

class CheckOutController extends Controller
{
    public $info = [];
    public function index ()
    {
        //lấy dữ liệu danh mục
        $categories = ProductCategory::where('status','1')->get();
        $data['categories'] = $categories;
        return view('front.checkout.index', $data);
    }
    public function addOrder(CheckOutRequest $request) 
    {
        // dd($request->except('redirect'));
        
        if($request->payment_type == "pay_later")  // xử lí thanh toán sau gửi email thông báo 
        { 
              // thêm đơn hàng
            $order = Order::create($request->except('redirect'));

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
        if($request->payment_type == "online_payment") {

            // lưu thông tin khách mua hàng
            $information = $request->except('redirect');

            session(['infomation' => $information]);

            // $this->info = $request->except('redirect');

            // dd($this->info);

            //
            $subtotal = Session()->get('Cart')->totalPrice;

            $this->Payment_online( $subtotal);
        }
                
    }
    public function Payment_online( $subtotal){
            $code = rand(00,99999);
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://127.0.0.1:8000/shop";
            $vnp_TmnCode = "U6WV27XE";//Mã website tại VNPAY 
            $vnp_HashSecret = "TGWZCTVCITVOLNFVQUNPYEDCKPUEBKCJ"; //Chuỗi bí mật
            $data = 'abc' ;

            $vnp_TxnRef = $code; 
            $vnp_OrderInfo = 'thanh toán hóa đơn MylaStore';
            $vnp_OrderType = 'bill';
            $vnp_Amount = $subtotal * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode ='NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
           
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => route('vnpayReturn', $data),
                "vnp_TxnRef" => $vnp_TxnRef,
            );
        
            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array('code' => '00'
                , 'message' => 'success'
                , 'data' => $vnp_Url);
                if (isset($_POST['redirect'])) {
                    header('Location: ' . $vnp_Url);
                    die();
                } else {
                    echo json_encode($returnData);
                }
                // vui lòng tham khảo thêm tại code demo
                    
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
    public function vnpayReturn(Request $request){
        dd($request->all());
    }
}
