<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Exception;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function showAddProduct(){
        $data = [];
        $categories = ProductCategory::where('status','1')->get();
        $data['categories'] = $categories;
        $brands = Brand::where('status','1')->get();
        $data['brands'] = $brands;
        return view('dashboard.product.create', $data);
    }
    public function AddProduct(Request $request){

        $dataSave = [
            'brand_id' => $request->brand_id,
            'product_category_id' => $request->product_category_id,
            'name' => $request->name,
            'description' => $request->description,
            'content' => $request->content,
            'price' => $request->price,
            'qty' => $request->qty,
            'discount' => $request->discount,
            'weight' => null,
            'sku' => null,
            'featured' => $request->featured,
            'tag' => null,
            'status' => $request->status,
        ];
        try {
             $product= Product::create($dataSave); // lưu vào table product
             if($request->has('path'))
             {
                 $file = $request->path;
                 $file_name = $file->getClientOriginalName();
                 $file->move('front/img/products',$file_name);
                 ProductImage::create([
                    'product_id' => $product->id,  // lưu vào table img nếu có 
                    'path' => $file_name
                 ]);
             }
             return redirect()->back()->with('success', 'Thêm mới thành công.');

         } catch (Exception $ex) {
             return redirect()->back()->with('error', 'Thêm mới thất bại.');
         }
    }
}
