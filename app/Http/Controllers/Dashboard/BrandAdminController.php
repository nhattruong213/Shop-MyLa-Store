<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\BrandRequest;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;

class BrandAdminController extends Controller
{
    public function showAddBrand() {
        return view('dashboard.brands.create');
    }

    public function AddBrand(BrandRequest $request){
        $dataSave = $request->only([
            'name',
            'status',
            'description',
        ]);
      
        try {
           // dd($dataSave);
            Brand::create($dataSave);
            return redirect()->back()->with('success', 'Thêm mới thành công.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Thêm mới thất bại.');
        }
    }
    public function ShowAllBrand(){
        $data = [];
        $brands = Brand::paginate(10);
        $data['brands'] = $brands;
        return view('dashboard.brands.show', $data);
    }
    public function searchBrandAdmin(Request $request){
        $data = [];
        $search = $request->name;
        $brands = Brand::where('name','like','%'.$search.'%')->paginate(10);
        $data['brands'] = $brands;
        return view('dashboard.brands.show', $data);
    }
    public function deleteAdminBrand($id){
        $brand = Brand::findOrFail($id);
        try {
            $brand->delete();
             return redirect()->back()->with('success', 'Xóa thành công.');
         } catch (Exception $ex) {
             return redirect()->back()->with('error', 'Xóa thất bại.');
         }
    }
    public function editAdminBrand($id){
        $data = [];
        $brand = Brand::findOrFail($id);
        $data['brand'] = $brand;
        return view('dashboard.brands.edit', $data);
    }
    public function UpdateBrand($id, BrandRequest $request){
        $brand = Brand::findOrFail($id);
        
        try {
            $brand->update([
                'name'=> $request->name,
                'status' => $request->status,
                'description' =>$request->description,
            ]);
             return redirect()->route('ShowAllBrand')->with('success', 'Chỉnh sửa thành công.');
         } catch (Exception $ex) {
             return redirect()->back()->with('error', 'Chỉnh sửa thất bại.');
         }
    }
}
