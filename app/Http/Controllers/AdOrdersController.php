<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Orders_model;

class AdOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active=6;
        $i=0;
        $list_orders = Orders_model::orderBy('orders.created_at','desc')->get();
        $Users = User::orderBy('created_at','desc')->get();
        return view('backEnd.orders.index',compact('menu_active','Users','list_orders','i'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $update_status=Orders_model::findOrFail($id);
        
        //dd($request->all());die();
        
        
        $update_status->update(['shipping_status' => '1']);
        return redirect()->route('order.index')->with('message','Updated Success!');
    }

    public function destroy1($id)
    {
        $update_status=Orders_model::findOrFail($id);
        
        //dd($request->all());die();
        
        
        $update_status->update(['pay_status' => '1']);
        return redirect()->route('order.index')->with('message','Updated Success!');
    }
}
