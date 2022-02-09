<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $categories = ProductCategory::get();
        $data['categories'] = $categories;

        $search = $request->search ?? '';

        // all bai viet
        $blogs = Blog::where('title', 'like', '%'.$search.'%')->paginate(9);
        $data['blogs'] = $blogs;

        //bai viet moi nhat
        $newblogs = Blog::orderBy('id','desc')->limit(3)->get();

        $data['newblogs'] = $newblogs;
        return view('front.blog.index', $data);
    }
    public function show($id)
    {
        $data= [];
        
        $categories = ProductCategory::get();
        $data['categories'] = $categories;


        $blog = Blog::findOrFail($id);
        $data['blog'] = $blog;

        return view('front.blog.show', $data);
    }
}
