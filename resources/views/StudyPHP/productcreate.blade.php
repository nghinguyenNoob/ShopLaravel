<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Product Create Page</title>
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
                        <li class="{{ Request::segment(1) == 'products-list' ? 'active' : null}}"><a href="/products-list"><i class="fas fa-clipboard-list"></i>Product List</a></li>
                        <li class="{{ Request::segment(1) == 'products-new' ? 'active' : null}}"><a href="/products-new"><i class="fas fa-list-alt"></i>Product Create</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

    <div class="menu-right">
        <div class="content">
            <div class="filter-search">
                <form action="{{url('products-save')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="cus-row">
                        <div class="col">
                            <label>Product Code</label>
                            <input name="product_code" value="{{ old('product_code')}}">
                            @error('product_code')
                            <div class="msg-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="cus-row">
                        <div class="col">
                            <label>Product Name</label>
                            <input name="product_name" value="{{ old('product_name')}}">
                            @error('product_name')
                            <div class="msg-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="cus-row">
                        <div class="col">
                            <label>Product Image</label>
                            <input type="file" id="product_image" name="product_image" value="{{ old('product_image')}}">
                            @error('product_image')
                            <div class="msg-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="cus-row">
                        <div class="col">
                            <label>Product Price</label>
                            <input type="number" name="product_price" value="{{ old('product_price')}}">
                            @error('product_price')
                            <div class="msg-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="cus-row">
                        <div class="col">
                            <label>Product Color</label>
                            <input name="product_color" value="{{ old('product_color')}}">
                            @error('product_color')
                            <div class="msg-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="cus-row">
                        <div class="col">
                            <label>Product Description</label>
                            <textarea name="product_description" value="{{ old('product_description')}}"></textarea>
                            @error('product_description')
                            <div class="msg-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="cus-row">
                        <div class="col">
                            <label>Product Category</label>
                            @if(count($productCategory) > 0)
                            <select name="product_category">
                                <option value="">--Select Category--</option>
                                @foreach($productCategory as $category)
                                <option value="{{$category['id']}}" @if($category['id']==old('product_category')) selected @endif>{{$category['name']}}</option>
                                @endforeach
                            </select>
                            @endif
                            @error('product_category')
                            <div class="msg-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="cus-row">
                        <div class="col">
                            <button type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    // Drop
    $(function() {
        $('#drop-btn').click(function() {
            $('#drop-btn .drop-list').toggle('slide');
        });
    });

    // Drop open after load page
    $(document).ready(function() {
        if (window.location == 'products-list' || window.location == 'products-new') {
            $("#drop-btn").click();
        }
    });
</script>

</html>