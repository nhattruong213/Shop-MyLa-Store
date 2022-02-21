<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductComment;
use Exception;
use Illuminate\Http\Request;

class ShopController extends Controller
{
   
    public function show($id)
    {   
        $data = [];
        $product = Product::findOrFail($id);
        $data['product']= $product;

        //lấy dữ liệu danh mục
        $categories = ProductCategory::where('status','1')->get();
        $data['categories'] = $categories;

        //dữ liệu brand
        $brands = Brand::get();
        $data['brands'] = $brands;
  

        // tính trung bình rating
        $avgRating = 0;
        $sumRating = array_sum(array_column($product->productComments->toArray(), column_key:'rating'));
        $countRating = count($product->productComments);

        if($countRating !=0){
            $avgRating = $sumRating/$countRating;
        }
        $data['avgRating'] = $avgRating;

        // phần sản phẩm gợi ý ( cuungf 1 danh mục, cùng tg)
        $relateProducts = Product::where('product_category_id', $product->product_category_id)->where('tag',$product->tag)->limit(3)->get();
        $data['relateProducts'] = $relateProducts;

        // dd($relateProducts);

        return view('front.shop.show', $data);
    }
    public function postComment(CommentRequest $request)
    {
       
            ProductComment::create($request->all());
            return redirect()->back();
    }
    public function index(Request $request)
    {   
        $data = [];

        //lấy dữ liệu danh mục
        $categories = ProductCategory::get();
        $data['categories'] = $categories;

        //dữ liệu brand
        $brands = Brand::get();
        $data['brands'] = $brands;


        // lấy dữ liệu sắp xếp từ request
        $perPage = $request->show ?? 9;
        $sortBy = $request->sort_by ?? 'bth';
        $search = $request->search ?? '';

       // search
        $products = Product::where('name', 'like', '%'.$search.'%')->where('status','1');


        //theo brands
        $products = $this->filter_brand($products,$request) ;


        //sắp xếp
        switch ($sortBy) {
            case 'bth':
                $products = $products->orderBy('id');
                break;
            case 'price-up':
                $products = $products->orderBy('discount');
                break;
            case 'price-down':
                $products = $products->orderBy('discount','desc');
                break;
            default:
                $products = $products->orderBy('id');
                break;
        }


        $products = $products->paginate($perPage);
        $products->appends(['sort_by'=>$sortBy, 'show'=>$perPage]);
        $data['products'] = $products;
        return view('front.shop.index', $data);
    }

    public function category(Request $request,$id)
    {
        $data = []; 

        //
        $perPage = $request->show ?? 9;
        $sortBy = $request->sort_by ?? 'bth';
        $search = $request->search ?? '';

        // category
        $categories =ProductCategory::where('status','1')->get();
        $data['categories'] = $categories;

        //dữ liệu brand
        $brands = Brand::get();
        $data['brands'] = $brands;


        // dữ liệu product
        $products = Product::where('product_category_id', $id)->where('status','1');


        //  //theo brands and category
        $products = $this->filter_brand($products,$request) ;


        //sắp xếp

        switch ($sortBy) {
            case 'bth':
                $products = $products->orderBy('id');
                break;
            case 'price-up':
                $products = $products->orderBy('discount');
                break;
            case 'price-down':
                $products = $products->orderBy('discount','desc');
                break;
            default:
                $products = $products->orderBy('id');
                break;
        }


        $products = $products->paginate($perPage);
        $products->appends(['sort_by'=>$sortBy, 'show'=>$perPage]);
        $data['products'] = $products;
        return view('front.shop.index', $data);

    }
    
    public function filter_brand ($products, Request $request) {
        $brands = $request->brand ?? [];
        $brand_ids = array_keys($brands);
        
        $products = $brand_ids != Null ? $products->whereIn('brand_id', $brand_ids) : $products;
        return $products;
        
    }
}
