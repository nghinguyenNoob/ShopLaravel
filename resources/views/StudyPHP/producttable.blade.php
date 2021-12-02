<div class="filter-search">
    <form action="{{url('products-list')}}" method="get">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="cus-row">
            <div class="col">
                <label>Product Id</label>
                <input autofocus name="product_id" value="{{ old('product_id')}}">
            </div>
            <div class="col">
                <label>Product Code</label>
                <input name="product_code" value="{{ old('product_code')}}">
            </div>
            <div class="col">
                <label>Product Name</label>
                <input name="product_name" value="{{ old('product_name')}}">
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
            </div>
        </div>
        <div class="cus-row">
            <div class="col">
                <button id="search">Search</button>
            </div>
        </div>
    </form>
</div>
@if(!$productList->isEmpty())
<div class="line-view"></div>
<div class="paginate-cus">
    <div>{{$productList->appends(compact('perPage'))->withQueryString()->links()}}</div>
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