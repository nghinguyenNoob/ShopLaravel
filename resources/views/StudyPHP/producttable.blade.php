<div class="filter-search">
    <div class="cus-row">
        <div class="col">
            <label>Product Id</label>
            <input autofocus id="product_id" name="product_id" value="{{ old('product_id')}}">
        </div>
        <div class="col">
            <label>Product Code</label>
            <input id="product_code" name="product_code" value="{{ old('product_code')}}">
        </div>
        <div class="col">
            <label>Product Name</label>
            <input id="product_name" name="product_name" value="{{ old('product_name')}}">
        </div>
    </div>
    <div class="cus-row">
        <div class="col">
            <label>Product Category</label>
            @if(count($productCategory) > 0)
            <select id="product_category" name="product_category">
                <option value="">--Select Category--</option>
                @foreach($productCategory as $category)
                <option value="{{$category['id']}}" @if($category['id']==old('product_category')) selected @endif>{{$category['name']}}</option>
                @endforeach
            </select>
            @endif
        </div>
    </div>
    <div class="cus-row">
        <div class="col">
            <button id="search">Search</button>
        </div>
    </div>
</div>
@if(!$productList->isEmpty())
<div class="line-view"></div>
<div class="paginate-cus">
    <!-- <div>{{$productList->appends(compact('perPage'))->withQueryString()->links()}}</div> -->
    <div>{{$productList->links('vendor.pagination.custom')}}</div>
    <select id="pagination">
        <option value="2" @if( old('perPage')==2) selected @endif>2</option>
        <option value="4" @if( old('perPage')==4) selected @endif>4</option>
        <option value="6" @if( old('perPage')==6) selected @endif>6</option>
    </select>
</div>
<div class="view-table">
    <table class="content-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product name</th>
                <th>Code</th>
                <th>Color</th>
                <th>Description</th>
                <th>Image</th>
                <th>Price</th>
            <tr>
        </thead>
        <tbody>
            @foreach ($productList as $product)
            <tr>
                <td>{{$product['id']}}</td>
                <td>{{$product['p_name']}}</td>
                <td>{{$product['p_code']}}</td>
                <td>{{$product['p_color']}}</td>
                <td>{{$product['description']}}</td>
                <td><img src="{{ asset('storage/'.$product['image']) }}" style="width: 200px;"></td>
                <td>{{$product['price']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="view-error">
    <label>Data not found!</label>
</div>
@endif
<script>
    // Option row on page
    $('#pagination').change(function() {
        $perPage = this.value;
        window.location = '{!! $productList->url(1)!!}&perPage=' + this.value;
    });

    // Drop
    $(function() {
        $('#drop-btn').click(function() {
            $('#drop-btn .drop-list').toggle('slide');
        });
    });

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if (window.location == 'products-list' || window.location == 'products-new') {
            $("#drop-btn").click();
        }
    });

    $('#search').click(function() {

        searchProduct();

    });

    $('a.page-link').click(function() {
        page = 1;
        perPage = 2;
        searchProduct(page, perPage);

    });

    function searchProduct(page, perPage) {
        $.ajax({
            url: 'products-list',
            type: 'post',
            dataType: 'json',
            cache: false,
            data: {
                'product_id': $('#product_id').val(),
                'product_code': $('#product_code').val(),
                'product_name': $('#product_name').val(),
                'product_category': $('#product_category').val(),
                'page': page,
                'perPage': perPage
            },
            success: function(data) {
                $('.content-1').empty().html(data['data']);
            },
            error: function(e) {
                $('.content-1').empty();
            }
        });
    }
</script>