<?php

namespace App\Http\Controllers;

use App\Category_model;
use App\ImageGallery_model;
use App\ProductAtrr_model;
use App\Products_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Orders_model;

class IndexController extends Controller
{
    public function index(){
       $products = Products_model::paginate(6);
       return view('frontEnd.index',compact('products'));
    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
        $products = Products_model::paginate(6);
        return view('frontEnd.pagination_data', compact('products'))->render();
     }
    }

    public function shop(){
        $products = Products_model::paginate(6);
        $byCate="";
        return view('frontEnd.index',compact('products'));
     }

     public function detialpro($id){
         $detail_product = Products_model::findOrFail($id);
         $imagesGalleries = ImageGallery_model::where('products_id',$id)->get();
         $totalStock = ProductAtrr_model::where('products_id',$id)->sum('stock');
         $relateProducts=Products_model::where([['id','!=',$id],['categories_id',$detail_product->categories_id]])->get();
        return view('frontEnd.product_details',compact('detail_product','imagesGalleries','totalStock','relateProducts'));
     }

     
   
    public function listByCat($id){
     
        $list_product = DB::table('products')->join('categories','products.categories_id','=','categories.id')->select('products.*')->where('categories.id',$id)->orwhere('categories.parent_id',$id)->get();
        $byCate=Category_model::select('name')->where('id',$id)->first();
        return view('frontEnd.childproducts',compact('list_product','byCate'));
        
     }

     public function listByChildCat($id){
         $list_product=Products_model::where('categories_id',$id)->get();
        $byCate=Category_model::select('name')->where('id',$id)->first();
        return view('frontEnd.products',compact('list_product','byCate'));
      
      }

      public function search(Request $request){
        $query = $request->get('search_name');
        $products = DB::table('products')->join('categories','products.categories_id','=','categories.id')->select('products.*')->where('p_name','LIKE', '%' . $query . '%')->orwhere('categories.name','LIKE', '%' . $query . '%')->get();;
        return view('frontEnd.search',compact('products'));
     
     }
      public function getAttrs(Request $request){
        $all_attrs=$request->all();
       // print_r($all_attrs);die();
        $attr=explode('-',$all_attrs['size']);
        //echo $attr[0].' <=> '. $attr[1];
        $result_select=ProductAtrr_model::where(['products_id'=>$attr[0],'size'=>$attr[1]])->first();
        echo $result_select->price."#".$result_select->stock;
    }

    public function viewOrders(){
        $id_user =Auth::user()->id;
        $orders = Orders_model::where('users_id',$id_user)->orderBy('created_at', 'DESC')->get();
        return view('frontEnd.viewOrders',compact('orders'));
    }


    function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            if($query == ""){
                return;
            }
          //  $data = DB::table('products')
         //   ->join('categories', 'products.categories_id', '=', 'categories.id')
         //   ->where('products.p_name','LIKE', '%{$query}%')
          //  ->orwhere('categories.name','LIKE', '%{$query}%')
         //   ->select('products.*', 'categories.name')
         //   ->get();
            $data= DB::table('products')->where('p_name','LIKE', '%' . $query . '%')->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:absolute; z-index:2;left: 4%;width:92%;">';
            
        foreach($data as $row)
        {
            $output .= '
            <li><a href="#">'.$row->p_name.'</a></li>
            ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }



}