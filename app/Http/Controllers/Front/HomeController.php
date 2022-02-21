<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        // 4 sản phẩm mới nhất của nam
        $menProducts = Product::where('featured', 1)->where('product_category_id', 1)->where('status','1')-> with('productImages')-> take(4) ->get();
        $data['menProducts'] = $menProducts;

        // 4 sản phẩm mới nhất của nữ 
        $womenProducts = Product::where('featured', 1)->where('product_category_id', 2)->where('status','1')-> with('productImages')-> take(4) ->get();
        $data['womenProducts']= $womenProducts;

        // 3 blog
        $blogs = Blog::orderBy('id','desc')->limit(3)->get();
        $data['blogs'] = $blogs;

        // category 

        $categories = ProductCategory::where('status','1')->get();
        $data['categories'] = $categories;

        return view('front.index', $data);
    }

}
