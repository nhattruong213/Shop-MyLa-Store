<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class CategoryController extends Controller
{
    private $category;

    /**
     * Constructor
     */
    public function __construct(ProductCategory $category)
    {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->paginate(2);
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // insert to DB
         $categoryInsert = [
            'name' => $request->name,
            'status' => $request->status,
        ];

        try {
            $this->category->create($categoryInsert);

            return response()->json(['sucess' => 'Insert into data to Category Sucessful.']);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->category->find($id);
        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $category = $this->category->findOrFail($id);
            // set value for field name
            $category->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);

            return response()->json(['success' => 'Insert Category successful!']);
        } catch (\Exception $ex) {
            // have error so will show error message (response status = 500 FAIL)
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // delete Category
            $this->category->findOrFail($id)
                ->delete();

            return response()->json(['success' => 'Delete Category successful!']);
        } catch (\Exception $ex) {
            // have error so will show error message (response status = 500 FAIL)
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }
}
