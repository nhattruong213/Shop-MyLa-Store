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
         $categories = ProductCategory::get();
         $data['categories'] = $categories;

        return view('front.shop.cart', $data);
    }

    public function AddCart(Request $request, $id)
    {   
        $quanty  = $request->quanty;
        $product = Product::where('id', $id) -> first();
        if($product != null ){
            $oldcart = Session('Cart') != null ? Session('Cart') : null ;
            $newcart = new Cart($oldcart);
            $newcart->AddCart($product, $id, $quanty);
            $request->session()->put('Cart',$newcart); // luu gt session 
            // dd(Session('Cart'));
        }
        if($quanty !=null ){
            return redirect()->route('cart');
        }else
            return view('front.shop.components.cart-hover');
    }

    public function DeleteItemCart(Request $request, $id)
    {
        $oldcart = Session('Cart') != null ? Session('Cart') : null ;
        $newcart = new Cart($oldcart);
        $newcart->DeleteItemCart($id);
        if(count($newcart->products) > 0 ){
            $request->session()->put('Cart',$newcart); // luu gt session 
        }
        else{
            $request->session()->forget('Cart');
        }
        return view('front.shop.components.cart-hover');    
    }

    public function DeleteListCart(Request $request, $id)
    {
        $oldcart = Session('Cart') != null ? Session('Cart') : null ;
        $newcart = new Cart($oldcart);
        $newcart->DeleteItemCart($id);
        if(count($newcart->products) > 0 ){
            $request->session()->put('Cart',$newcart); // luu gt session 
        }
        else{
            $request->session()->forget('Cart');
        }
        return view('front.shop.components.list-cart');    
    }

    public function DeleteAllCart(Request $request) 
    {
        $request->session()->forget('Cart');
        return redirect()->back();
    }

    public function UpdateItemCart(Request $request, $id)
    {
        $quanty = $request->quanty;
        $oldcart = Session('Cart') != null ? Session('Cart') : null ;
        $newcart = new Cart($oldcart);
        $newcart->UpdateItemCart($id, $quanty);
        $request->session()->put('Cart',$newcart); 
        return redirect()->back();
    }
}
