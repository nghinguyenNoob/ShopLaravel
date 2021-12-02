@extends('frontEnd.layouts.master')
@section('title','Home Page')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    
                </div>

                <div class="col-sm-12 ">
                    <div class="features_items"><!--features_items-->
                        
                        @foreach($orders as $order)
                        <div style="border: 1px solid grey; padding: 20px; margin: 20px;">
                            <h2 class="title text-left">Đơn hàng ngày {{$order->created_at}}<span>
                            @if($order->shipping_status)
                                <span>:" Đã thanh toán "</span>
                            
                            @else
                                <span style="color:red;">:" Chưa Thanh toán "</span>
                            
                            @endif
                            </span></h2><br>

                            @foreach($order->attributes as $order1)
                                <div style="display:flex;border-top: 1px dotted orange;padding-top:5px;" >
                                    <div><img src="{{url('products/small/',$order1->product->image)}}" alt="" style="width:100px; padding-right:30px;padding-bottom:30px;" /></div>
                                        <div  >
                                            <div ><p style="font-size: 18px;">{{$order1->product_name}}x{{$order1->size}}x{{$order1->quantity}}</p></div>
                                            <div ><p style="font-size: 18px;">Giá: {{$order1->price}} VNĐ</p></div>
                                        </div>
                                    </div>
                            @endforeach
                                
                            <h2 class="title text-center">Tổng số tiền: {{$order->grand_total}}VNĐ</h2><br>
                        </div>
                           
                        @endforeach
                    </div><!--features_items-->

                </div>
            </div>
        </div>
    </section>
@endsection