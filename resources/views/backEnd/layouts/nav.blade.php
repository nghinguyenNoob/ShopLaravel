<!--sidebar-menu-->
<div id="sidebar" ><a href="{{url('/admin')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul style="background-image: linear-gradient(to right, rgba(255,0,0,0), rgba(255,0,0,1));;">
        <li{{$menu_active==1? ' class=active':''}}><a href="{{url('/admin')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="submenu {{$menu_active==2? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Danh mục</span></a>
            <ul>
                <li><a href="{{url('/admin/category/create')}}">Thêm danh mục</a></li>
                <li><a href="{{route('category.index')}}">Danh sách danh mục</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==3? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Sản Phẩm</span></a>
            <ul>
                <li><a href="{{url('/admin/product/create')}}">Thêm Sản Phẩm mới</a></li>
                <li><a href="{{route('product.index')}}">Danh sách sản phẩm</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==4? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Mã Giảm giá</span></a>
            <ul>
                <li><a href="{{route('coupon.create')}}">Thêm mã giảm giá</a></li>
                <li><a href="{{route('coupon.index')}}">Danh sách mã giảm giá</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==5? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Quản lí khách hàng</span></a>
            <ul>
              
                <li><a href="{{route('user.index')}}">Danh sách người dùng</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==6? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Quản lí đơn hàng</span></a>
            <ul>
              
                <li><a href="{{route('order.index')}}">Danh sách đơn hàng</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==7? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Thống Kê</span></a>
            <ul>
              
                <li><a href="{{url('/admin/laravel_google_chart')}}">Thống kê Sản Phẩm</a></li>
            </ul>
        </li>
    </ul>
</div>
<!--sidebar-menu-->