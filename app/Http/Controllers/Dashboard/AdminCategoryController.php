<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function showAddCategory() {
        return view('dashboard.category.create');
    }
    public function AddCategory(Request $request){
        $dataSave = $request->only([
            'name',
            'status',
        ]);
        // dd($dataSave);
        ProductCategory::create($dataSave);
        return redirect()->back()->with('success', 'Thêm mới thành công.');
    }
}
