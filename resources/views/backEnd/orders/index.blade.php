@extends('backEnd.layouts.master')
@section('title','List Orders')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('order.index')}}" class="current">Orders</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done!</strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>List Products</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã Hóa Đơn</th>
                        <th>Tên Khách Hàng</th>
                        <th>Số Điện Thoại</th>
                        <th>Giá đơn hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Xem giỏ hàng</th>
                        <th>Xem DVVC</th>
                        <th>Xem TTKH</th>
                        <th>ttvc</th>
                        <th>tttt</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list_orders as $order)
                        <?php $i++; ?>
                        <tr class="gradeC">
                            <td>{{$i}}</td>
                            <td style="text-align: center;">{{$order->id}}</td>
                            <td style="vertical-align: middle;">{{$order->name}}</td>
                            <td style="vertical-align: middle;">{{$order->mobile}}</td>
                            <td style="vertical-align: middle;">{{$order->grand_total}}</td>
                            <td style="vertical-align: middle;">{{$order->created_at}}</td>
                            <td style="vertical-align: middle;text-align: center;"><a href="#myModal{{$order->id}}" data-toggle="modal" class="btn btn-primary btn-mini">Giỏ Hàng</a></td>
                            <td style="vertical-align: middle;text-align: center;"><a href="#myModal2{{$order->id}}" data-toggle="modal" class="btn btn-warning btn-mini">TTVC</a></td>
                            <td style="vertical-align: middle;text-align: center;"><a href="#myModal3{{$order->id}}" data-toggle="modal" class="btn btn-success btn-mini">TTKH</a></td>
                            <td style="text-align: center; vertical-align: middle;">
                               
                                    @if($order->shipping_status)
                                        <a  style="pointer-events: none;" href="#" data-toggle="modal"  disabled   class="btn btn-dangerous btn-mini"><span>Đã vận chuyển</span></a>
                                    @else   
                                        <a href="#" data-toggle="modal" rel="{{$order->id}}" rel1="update-status"   class="btn btn-danger deleteRecord"><span>Chưa vận chuyển</span></a>
                                    @endif
                                
                               
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                               
                                    @if($order->pay_status)
                                        <a  style="pointer-events: none;" href="#" data-toggle="modal"  disabled   class="btn btn-dangerous btn-mini"><span>Đã Thanh Toán</span></a>
                                    @else   
                                        <a href="#" data-toggle="modal" rel="{{$order->id}}" rel1="update-status1"   class="btn btn-danger deleteRecord1"><span>Chưa Thanh Toán</span></a>
                                    @endif
                                
                               
                            </td>
                        </tr>
                        {{--Pop Up Model for View Ordering--}}
                        <div id="myModal{{$order->id}}" class="modal hide">
                            <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3>Danh sách sản phẩm của đơn hàng: </h3>
                                
                            </div>
                            <div class="modal-body" style="display:flex; flex-direction: column;">
                            
                                   
                                
                                @foreach($order->attributes as $card)
                                <div style="display:flex;">
                                <div><img src="{{url('products/small/',$card->product->image)}}" alt="" style="width:70px; padding-right:30px;padding-bottom:30px;" /></div>
                                    <div>
                                    <p style="font-size: 18px;">{{$card->product_name}}x{{$card->size}}x{{$card->quantity}}</p>
                                    <p>x{{$card->price}}</p>
                                    </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        {{--Pop Up Model for View Ordering--}}

                        {{--Pop Up Model for View delivery--}}
                        <div id="myModal2{{$order->id}}" class="modal hide">
                            <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">X</button>
                                <h3>Xem Thông Tin Vận chuyển của đơn hàng: </h3>
                                
                            </div>
                            <div class="modal-body" style="display:flex;">
                                <div><img src="{{asset('img/ship.png')}}" alt="" style="width:120px; padding-right:30px;" /></div>
                                <div>
                                    <p></p>
                                    <div class="text-left"><h4> Tên khách hàng: {{$order->name}}</h4></div>
                                    <p class="text-left"> Địa chỉ vận chuyển: {{$order->address}} </p>
                                    <p class="text-left"> Thành Phố: {{$order->city}} </p>
                                    <p class="text-left"> Số Điện Thoại: {{$order->mobile}} </p>
                                </div>
                                
                            </div>
                        </div>
                        {{--Pop Up Model for View delivery--}}

                        
                        {{--Pop Up Model for View delivery--}}
                        <div id="myModal3{{$order->id}}" class="modal hide">
                            <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3>Xem Thông Tin Khách hàng của đơn hàng: </h3>
                                
                            </div>
                            <div class="modal-body" style="display:flex;">
                            <div><img src="{{asset('img/users.jpg')}}" alt="" style="width:120px; padding-right:30px;" /></div>
                                <div>
                                    <p></p>
                                    <div class="text-left"><h4>Tên khách hàng: {{$order->user->name}}</h4></div>
                                    <p class="text-left">Email của khách hàng: {{$order->user->email}} </p>
                                    <p class="text-left">Số Điện Thoại: {{$order->user->mobile}} </p>
                                </div>
                            </div>
                        </div>
                        {{--Pop Up Model for View delivery--}}
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('jsblock')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.ui.custom.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.uniform.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/matrix.js')}}"></script>
    <script src="{{asset('js/matrix.tables.js')}}"></script>
    <script src="{{asset('js/matrix.popover.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        $(".deleteRecord").click(function () {
            var id=$(this).attr('rel');
            var deleteFunction=$(this).attr('rel1');
            swal({
                title:'xác nhận đã vận chuyển?',
                text:"Bạn không thể thay đổi!",
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                confirmButtonText:'Xác nhận',
                cancelButtonText:'cancel',
                confirmButtonClass:'btn btn-success',
                cancelButtonClass:'btn btn-danger',
                buttonsStyling:false,
                reverseButtons:true
            },function () {
                window.location.href="/admin/"+deleteFunction+"/"+id;
            });
        });

        $(".deleteRecord1").click(function () {
            var id=$(this).attr('rel');
            var deleteFunction=$(this).attr('rel1');
            swal({
                title:'xác nhận đã thanh toán?',
                text:"Bạn không thể thay đổi!",
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                confirmButtonText:'Xác nhận',
                cancelButtonText:'cancel',
                confirmButtonClass:'btn btn-success',
                cancelButtonClass:'btn btn-danger',
                buttonsStyling:false,
                reverseButtons:true
            },function () {
                window.location.href="/admin/"+deleteFunction+"/"+id;
            });
        });
    </script>
@endsection