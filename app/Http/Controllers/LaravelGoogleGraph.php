<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cart_model;

class LaravelGoogleGraph extends Controller
{
    function index()
    {
    $menu_active=7;
    $data = DB::table('cart')
       ->leftJoin('products', 'cart.products_id', '=', 'products.id')
       ->leftJoin('categories', 'products.categories_id', '=', 'categories.id')
       
       ->select( DB::raw('categories.name as danhmuc'),
                 DB::raw('count(*) as number'))
        
       ->groupBy('danhmuc')
       ->get();
     
     $array[] = ['Danhmuc', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->danhmuc, $value->number];
     }
     return view('backEnd.chart.charts')->with('danhmuc', json_encode($array))->with('menu_active',$menu_active);
    }
}
