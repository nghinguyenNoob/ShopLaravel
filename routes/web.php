<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// home controller
Route::get('/home', 'HomeController@index')->name('home');

// shows products 
Route::get('/','IndexController@index');
Route::get('/pagination/fetch_data', 'IndexController@fetch_data');
Route::get('/list-products','IndexController@shop');
Route::get('/cat/{id}','IndexController@listByCat')->name('cats');
Route::get('/childcat/{id}','IndexController@listByChildCat')->name('childcats');
Route::get('/product-detail/{id}','IndexController@detialpro');
//get attributes the product
Route::get('/get-product-attr','IndexController@getAttrs');
Route::get('/xemdonhang','IndexController@viewOrders');
// ma giam gia
Route::post('/apply-coupon','CouponController@applycoupon');
//card
Route::post('/addToCart','CartController@addToCart')->name('addToCart');
Route::get('/viewcart','CartController@index');
Route::get('/cart/deleteItem/{id}','CartController@deleteItem');
Route::get('/cart/update-quantity/{id}/{quantity}','CartController@updateQuantity');
Route::get('/cart/update-ttquantity','CartController@updatettQuantity');
//search
Route::get('/autocomplete/fetch', 'IndexController@fetch')->name('autocomplete.fetch');
Route::get('/search', 'IndexController@search');
//login
Route::get('/login_page','UsersController@index');
Route::get('/register_page','UsersController@indexRegister');
Route::post('/register_user','UsersController@register');
Route::post('/user_login','UsersController@login');
Route::get('/logout','UsersController@logout');

////// User Authentications //////////
Route::group(['middleware'=>'FrontLogin_middleware'],function (){
    Route::get('/myaccount','UsersController@account');
    Route::put('/update-profile/{id}','UsersController@updateprofile');
    Route::get('/reset-password','UsersController@resetpassword');
    Route::put('/update-password/{id}','UsersController@updatepassword');
    Route::get('/check-out','CheckOutController@index');
    Route::post('/submit-checkout','CheckOutController@submitcheckout');
    Route::get('/order-review','OrdersController@index');
    Route::post('/submit-order','OrdersController@order');
    Route::get('/cod','OrdersController@cod');

    
});

Auth::routes(['register'=>false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function (){
    Route::get('/', 'AdminController@index')->name('admin_home');
    /// Setting Area
    Route::get('/settings', 'AdminController@settings');
    Route::get('/check-pwd','AdminController@chkPassword');
    Route::post('/update-pwd','AdminController@updatAdminPwd');


    Route::resource('/category','CategoryController');
    Route::get('delete-category/{id}','CategoryController@destroy');
    Route::get('/check_category_name','CategoryController@checkCateName');
///

    Route::resource('/product','ProductsController');
    Route::get('delete-product/{id}','ProductsController@destroy');
    Route::get('delete-image/{id}','ProductsController@deleteImage');

    Route::resource('/product_attr','ProductAtrrController');
    Route::get('delete-attribute/{id}','ProductAtrrController@deleteAttr');

      /// Product Images Gallery
      Route::resource('/image-gallery','ImagesController');
      Route::get('delete-imageGallery/{id}','ImagesController@destroy');

      //management user
      Route::resource('/user','AdUsersController');
    Route::get('delete-user/{id}','AdUsersController@destroy');
    //management orders
    Route::resource('/order','AdOrdersController');
    Route::get('update-status/{id}','AdOrdersController@destroy');
    Route::get('update-status1/{id}','AdOrdersController@destroy1');
    
    //ma giam gia
    Route::resource('/coupon','CouponController');
    Route::get('delete-coupon/{id}','CouponController@destroy');

    Route::get('/laravel_google_chart', 'LaravelGoogleGraph@index');

});
