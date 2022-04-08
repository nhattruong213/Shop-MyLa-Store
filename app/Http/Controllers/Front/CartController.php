<?php

namespace App\Http\Controllers\Front;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        // $cart = $request->session()->get('Cart');
        // // $request->session()->flush();
        // // dd($cart);
        // $data['Cart'] = $cart;



        //lấy dữ liệu danh mục
        $categories = ProductCategory::where('status', '1')->get();
        $data['categories'] = $categories;

        $products = Product::where('status', '1')->get();
        $data['products'] = $products;
        return view('front.shop.cart', $data);
    }


    public function addCartAjax(Request $request, $id)
    {
      
        $quanty  = $request->get('quanty', 1);
        $product = Product::findOrFail($id);

        // check phải trừ số lượng trong giỏ
        $check = Session('Cart')->products[$product->id]['quanty'] ?? "";
        $quantyCheck = $check == "" ? $product->qty : $product->qty - $check;

        if($quanty > $quantyCheck) {
            return response()->json([
                'error' => 'Số lượng vượt quá tồn kho, vui lòng chọn sản phẩm khác'
            ], 500);
        }
        if ($product != null) {
            $oldcart = Session('Cart') != null ? Session('Cart') : null;
            $newcart = new Cart($oldcart);
            $newcart->AddCart($product, $id, $quanty);
            $request->session()->put('Cart', $newcart); // luu gt session 
            // return response()->json([
            //     'success' => 'Thêm sản phẩm thành công',
            // ], 200);
            return view('front.shop.components.cart-hover');
        }
       
    }
    public function AddCart(Request $request, $id)
    {
        $quanty  = $request->get('quanty', 1);
        $product = Product::findOrFail($id);
        $check = Session('Cart')->products[$product->id]['quanty'] ?? "";
        $quantyCheck = $check == "" ? $product->qty : $product->qty - $check;

        if($quanty <= 0) {
            return redirect()->back()->with('error', 'Số lượng phải lớn hơn 0');
        }
        if($quanty > $quantyCheck) {
            return redirect()->back()->with('error', 'Số lượng vượt quá tồn kho, vui lòng chọn lại số lượng');
        }

        
        if ($product != null) {
            $oldcart = Session('Cart') != null ? Session('Cart') : null;
            $newcart = new Cart($oldcart);
            $newcart->AddCart($product, $id, $quanty);
            $request->session()->put('Cart', $newcart); // luu gt session 
            // dd(Session('Cart')->products[2]['quanty']);
        }
       
            return redirect()->route('cart');
      
    }

    public function DeleteItemCart(Request $request, $id)
    {
        $oldcart = Session('Cart') != null ? Session('Cart') : null;
        $newcart = new Cart($oldcart);
        $newcart->DeleteItemCart($id);
        if (count($newcart->products) > 0) {
            $request->session()->put('Cart', $newcart); // luu gt session 
        } else {
            $request->session()->forget('Cart');
        }
        return view('front.shop.components.cart-hover');
    }

    public function DeleteListCart(Request $request, $id)
    {
        $products = Product::where('status', '1')->get();
        $data['products'] = $products;
        $oldcart = Session('Cart') != null ? Session('Cart') : null;
        $newcart = new Cart($oldcart);
        $newcart->DeleteItemCart($id);
        if (count($newcart->products) > 0) {
            $request->session()->put('Cart', $newcart); // luu gt session 
        } else {
            $request->session()->forget('Cart');
        }
        return view('front.shop.components.list-cart',$data);
    }

    public function DeleteAllCart(Request $request)
    {
        $request->session()->forget('Cart');
        return redirect()->back();
    }

    public function UpdateItemCart(Request $request, $id, $quanty)
    {
        $products = Product::findOrFail($id);
  

        if($quanty <= 0) {
            return response()->json([
                'error' => 'Số lượng phải lớn hơn 0'
            ], 500);
        }

        if($quanty > $products->qty) {
            return response()->json([
                'error' => 'Số lượng vượt quá tồn kho, vui lòng cập nhật lại'
            ], 500);
        }
      
        if ($products != null) {
            $oldcart = Session('Cart') != null ? Session('Cart') : null;
            $newcart = new Cart($oldcart);
            $newcart->UpdateItemCart($id, $quanty);
            $request->session()->put('Cart', $newcart);
            return view('front.shop.components.list-cart');
        }
    }
}
