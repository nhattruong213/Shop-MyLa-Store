<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data = [];
        $categories = ProductCategory::where('status','1')->get();
        $data['categories'] = $categories;
        return view('auth.login', $data);
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return redirect()->route('login');
    }
    public function show() {
        $data = [];
        $categories = ProductCategory::where('status','1')->get();
        $data['categories'] = $categories;
        return view('front.profile.profile', $data);
    }
    public function ChangeProfile($id, ProfileRequest $request) {
        $user = User::findOrFail($id);
        try {
            $user->update([
                'first_name' => $request->first_name,
                'last_name' =>$request->last_name,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'street_address' => $request->street_address,
                'postcode_zip' => $request->postcode_zip,
                'town_city' => $request->town_city,
                'phone' => $request->phone,
                'description' => $request->description,
                'birthday' =>  $request->birthday,
                
            ]);
            if($request->has('avatar'))
             {
                 $file = $request->avatar;
                 $file_name = $file->getClientOriginalName();
                 $file->move('front/img/user',$file_name);
                 $user->update([
                     'avatar' => $file_name,
                 ]);
             }
            return redirect()->back()
                ->with('success', 'L??u h??? s?? th??nh c??ng.');
        } catch (Exception $ex) {
            return redirect()->back()
                ->with('error', 'L??u h??? s?? th???t b???i.');
        }
    }
    public function ViewHistoryOrder($id){
        $data = [];
        $categories = ProductCategory::where('status','1')->get();
        $data['categories'] = $categories;
        $orders = Order::where('user_id',$id)->orderBy('id','desc')->get();
        $data['orders'] = $orders;
        return view('front.profile.order', $data);
    }
    public function ViewOrderDetail($id){
        $data = [];
        $categories = ProductCategory::where('status','1')->get();
        $data['categories'] = $categories;
        $OrderDetails = OrderDetail::where('order_id',$id)->get();
        // dd($OrderDetails);
        $data['OrderDetails'] = $OrderDetails;
        return view('front.profile.detail', $data);
    }
    public function returnOrder($id) {
        $order = Order::findOrFail($id);
        if($order->status==0) {  // tr?????ng h???p ??ang ??ang ch??? th?? cho h???y 
            // 1. x??a chi ti???t c???a ????n h??ng ????
            $OrderDetail = OrderDetail::where('order_id', $order->id)->get();
            // c???p nh???t l???i s??? l?????ng t???n kho
            foreach($OrderDetail as $item){
                $product = Product::findOrFail($item->product_id);
                $product->qty += $item->qty;
                $product->save();
            }
            OrderDetail::where('order_id', $order->id)->delete();  // x??a order detail
             // x??a order
            $order->delete();
            return redirect()->back()->with('success', 'H???y ????n h??ng th??nh c??ng.');
        }
        else { // c??n l???i k cho h???y ????n
            return redirect()->back()->with('error', 'Kh??ng th??? h???y ????n h??ng n??y.');
        }
    }
}
