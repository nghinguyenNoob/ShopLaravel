<?php

namespace App\Http\Controllers;

use App\Category_model;
use App\Products_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

/**
 * Product Controller
 */
class ProductTestController extends Controller
{
    /**
     * Product List
     */
    public function productList(Request $request)
    {

        $perPage = 2;
        $productCategory = array();

        $request->flash();

        $productList = Products_model::select(
            'id',
            'p_name',
            'p_code',
            'p_color',
            'description',
            'price',
            'image'
        );

        if (!empty($request->product_id)) {
            $productList = $productList->whereId($request->product_id);
        }
        if (!empty($request->product_code)) {
            $productList = $productList->where("p_code", $request->product_code);
        }
        if (!empty($request->product_name)) {
            $productList = $productList->where("p_name", 'LIKE', '%' . $request->product_name . '%');
        }
        if (!empty($request->product_category)) {
            $productList = $productList->where("categories_id", $request->product_category);
        }
        $productList = $productList->paginate($request->perPage ? $request->perPage : $perPage);

        $productCategory = Category_model::select('id', 'name')->get()->toArray();

        if ($request->ajax()) {
            $data = view('StudyPHP/producttable', compact('productList', 'productCategory', 'perPage'))->render();
            return Response::json(['data' => $data]);
        }

        return view('StudyPHP/productlist', ['productList' => $productList, 'productCategory' => $productCategory, 'perPage' => $perPage]);
    }

    /**
     * Product init form create
     */
    public function productCreateForm(Request $request)
    {
        $productCategory = array();
        $request->flash();
        array_push($productCategory, ['id' => 1, 'category_name' => 'Laptop']);
        array_push($productCategory, ['id' => 2, 'category_name' => 'Phone']);
        array_push($productCategory, ['id' => 3, 'category_name' => 'Tablet']);

        return view('StudyPHP/productcreate', ['productCategory' => $productCategory]);
    }

    /**
     * Product save new record
     */
    public function productSave(Request $request)
    {
        $productCategory = array();
        $request->flash();
        array_push($productCategory, ['id' => 1, 'category_name' => 'Laptop']);
        array_push($productCategory, ['id' => 2, 'category_name' => 'Phone']);
        array_push($productCategory, ['id' => 3, 'category_name' => 'Tablet']);

        $validator = Validator::make($request->all(), [
            'product_code' => 'required|max:50',
            'product_name' => 'required|max:50',
            'product_price' => 'required|integer',
            'product_category' => ['required', Rule::in(1, 2, 3)],
            'product_image' => 'required|mimes:jpg,jpeg'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $fileName = $request->product_image->getClientOriginalName();
            $filePath = $request->product_image->storeAs('uploads', $fileName, 'public');

            $product = [
                'p_code' => $request->product_code,
                'p_name' => $request->product_name,
                'price' => $request->product_price,
                'p_color' => $request->product_color,
                'categories_id' => $request->product_category,
                'description' => $request->product_description,
                'image' => $filePath
            ];
            Products_model::insert($product);
        }

        return redirect('products-list');
    }
}
