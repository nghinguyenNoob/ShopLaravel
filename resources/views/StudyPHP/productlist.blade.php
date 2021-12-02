<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Product List Page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js " type="text/javascript"></script>
    <!-- Css custome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="{{asset('css/product.css')}}" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="menu-left">
        <ul id="nav">
            <li class="{{ Request::segment(1) == 'dashboard' ? 'active' : null}}"><a href="/products-list"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
            <li class="{{ Request::segment(1) == 'list-category' ? 'active' : null}}"><a href="/list-category"><i class="fas fa-landmark"></i>Categories</a></li>
            <!-- <li class="{{ Request::segment(1) == 'products-list' ? 'active' : null}}"><a href="/products-list"><i class="fas fa-clipboard-list"></i>Product List</a></li> -->
            <li class="{{ Request::segment(1) == 'list-ship' ? 'active' : null}}"><a href="/list-ship"><i class="fas fa-list-alt"></i>Ship List</a></li>
            <li class="{{ Request::segment(1) == 'list-warehouse' ? 'active' : null}}"><a href="/list-warehouse"><i class="fas fa-th-list"></i>Warehouse List</a></li>
            <li id="drop-btn">
                <a><i class="fas fa-th-list"></i>Drop</a>
                <div class="drop-list">
                    <ul>
                        <li id="drop-1" class="{{ Request::segment(1) == 'products-list' ? 'active' : null}}"><a href="/products-list"><i class="fas fa-clipboard-list"></i>Product List</a></li>
                        <li id="drop-2" class="{{ Request::segment(1) == 'products-new' ? 'active' : null}}"><a href="/products-new"><i class="fas fa-list-alt"></i>Product Create</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <div class="menu-right">
        <div class="content-1">
            @include('StudyPHP.producttable')
        </div>
    </div>
</body>
</html>