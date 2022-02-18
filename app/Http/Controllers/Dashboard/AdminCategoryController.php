<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Exception;
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
      
        try {
           // dd($dataSave);
            ProductCategory::create($dataSave);
            return redirect()->back()->with('success', 'Thêm mới thành công.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Thêm mới thất bại.');
        }
    }
    public function ShowAllCategory(){
        $data = [];
        $categories = ProductCategory::paginate(10);
        $data['categories'] = $categories;
        return view('dashboard.category.show', $data);
    }
    public function searchCategoryAdmin(Request $request){
        $data = [];
        $search = $request->name;
        $categories = ProductCategory::where('name','like','%'.$search.'%')->paginate(10);
        $data['categories'] = $categories;
        return view('dashboard.category.show', $data);
    }
    public function deleteAdminCategory($id){
        $category = ProductCategory::findOrFail($id);
        try {
            $category->delete();
             return redirect()->back()->with('success', 'Xóa thành công.');
         } catch (Exception $ex) {
             return redirect()->back()->with('error', 'Xóa thất bại.');
         }
    }
    public function editAdminCategory($id){
        $data = [];
        $category = ProductCategory::findOrFail($id);
        $data['category'] = $category;
        return view('dashboard.category.edit', $data);
    }
    public function UpdateCategory($id, Request $request){
        $category = ProductCategory::findOrFail($id);
        
        try {
            $category->update([
                'name'=> $request->name,
                'status' => $request->status,
            ]);
             return redirect()->route('ShowAllCategory')->with('success', 'Chỉnh sửa thành công.');
         } catch (Exception $ex) {
             return redirect()->back()->with('error', 'Chỉnh sửa thất bại.');
         }
    }
}
