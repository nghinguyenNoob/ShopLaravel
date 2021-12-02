<header id="header"><!--header-->
<div class="sticky-mune" id="hello-sticky">
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i>0964017907</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> uyennhinguyentruong@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                <div class="mainmenu pull-right">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{url('/viewcart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            @if(Auth::check())
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li class="dropdown"><a href="{{url('/myaccount')}}"> Tài khoản <i class="fa fa-user"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="{{url('/reset-password')}}">Đổi mật khẩu</a></li>
                                            <li><a href="{{url('/myaccount')}}">Cập nhật tài khoản</a></li>
                                            
                                        </ul>
                                    </li>
                                </ul>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-lock"></i> Thoát </a>
                                </li>
                                <li><a href="{{url('/xemdonhang')}}">Xem Đơn Hàng</a></li>
        
                            @else
                                <li><a href="{{url('/login_page')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                <li><a href="{{url('/register_page')}}"><i class="fa fa-lock"></i> Đăng ký</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    <div class="header-bottom" ><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{url('/')}}"><img src="{{asset('img/S1.png')}}" style="width:60px;" alt="" /></a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{url('/list-products')}}">Sản Phẩm</a></li>
                                    <li><a href="{{url('/myaccount')}}">Tài Khoản</a></li>
                                    <li><a href="{{url('/viewcart')}}">Giỏ Hàng</a></li>
                                </ul>
                            </li>
                            <li><a href="https://www.youtube.com/channel/UCH2Ir7rPaRN8ZPL9mSpclhw" target="_blank">Liên Hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5">
                    
                        <div class="form-group"  class="row">
                            <form action="{{url('/search')}}" method="get">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="col-sm-10">
                                    <input type="text" name="search_name" id="search_name" class="form-control input-lg m-0 p-0" placeholder="Search" autocomplete="off" />
                                    <div id="countryList">
                                    </div>
                                </div>
                                <button class="col-sm-2 btn-lg" style="float:left;"  type="submit"><i class="fa fa-search"></i></button>
                            
                            
                            </form>
                        </div>
                        
                    
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</div>
</header><!--/header-->