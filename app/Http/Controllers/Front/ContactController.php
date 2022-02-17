<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() 
    {
        $data = [];
        $categories = ProductCategory::where('status','1')->get();
        $data['categories'] = $categories;
        return view('front.contact', $data);
    }
}
