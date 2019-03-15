<?php

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

Route::get('/', 'ShopController@index');
Route::get('categories/{id}', 'ShopController@categories');
Route::get('products/{id}', 'ShopController@products');

Route::get('cart', 'ShopController@cart');
Route::put('addtocart', 'ShopController@addToCart');
Route::post('updatecart/{id}', 'ShopController@updateCart');
Route::post('removefromcart/{id}', 'ShopController@removeFromCart');

Route::get('search', 'ShopController@search');

Route::group(['middleware' => 'auth'], function () {

	Route::get('placeorder', 'ShopController@placeOrder');
	Route::post('confirmorder', 'ShopController@confirmOrder');
	Route::get('thankyou', 'ShopController@thankYou');
	Route::get('myorders', 'ShopController@myOrders');

	Route::get('help', 'ShopController@help');
	Route::get('help/enquiry', 'ShopController@enquiry');
	Route::post('help/enquiry', 'ShopController@submitEnquiry');
	Route::get('help/cancelorder', 'ShopController@cancelOrder');
	Route::post('help/cancelorder/{id}', 'ShopController@cancel');
	Route::get('help/trackorder', 'ShopController@trackOrder');
	Route::get('myenquiries', 'ShopController@myEnquiries');
	Route::get('myenquiry/{id}', 'ShopController@myEnquiry');

	Route::post('addtowishlist/{id}', 'ShopController@addToWishList');
	Route::post('removefromwishlist/{id}', 'ShopController@removeFromWishList');
	Route::get('mywishlist', 'ShopController@myWishList');

	Route::post('addaddress', 'ShopController@addAddress');
	Route::post('removeaddress/{id}', 'ShopController@removeAddress');
	Route::get('myaddresses', 'ShopController@myAddresses');

	Route::post('addreview/{id}', 'ShopController@addReview');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('admin', function(){
	return redirect('admin/orders');
});
Route::group(['prefix' => 'admin'], function(){
	Route::get('orders', 'OrderController@index');
	Route::get('canceledorders', 'OrderController@canceledOrders');
	Route::get('orders/{id}', 'OrderController@show');
	Route::post('status/{id}', 'OrderController@status');

	Route::get('categories', 'ProductsController@categories');
	Route::post('categories', 'ProductsController@addCategory');
	Route::delete('categories/{id}', 'ProductsController@removeCategory');

	Route::get('products/features/{id}', 'ProductsController@features');
	Route::post('products/addfeature/{id}', 'ProductsController@addFeature');
	Route::post('products/removefeature/{id}', 'ProductsController@removeFeature');

	Route::get('products/promotional', 'ProductsController@promotional');
	Route::post('products/{id}/createpromotion', 'ProductsController@createPromotion');
	Route::post('products/{id}/removepromotion', 'ProductsController@removePromotion');
	Route::resource('products', 'ProductsController');
	Route::put('products/{id}/active', 'ProductsController@active');

	Route::get('users', 'AdminController@users');
	Route::post('users/makeadmin/{id}', 'AdminController@makeAdmin');
	Route::post('users/makestaff/{id}', 'AdminController@makeStaff');
	Route::post('users/makecustomer/{id}', 'AdminController@makeCustomer');
	Route::post('users/removeuser/{id}', 'AdminController@removeUser');
	
	Route::get('enquiries/unanswered', 'StaffController@unanswered');
	Route::get('enquiries/answered', 'StaffController@answered');
	Route::get('enquiry/{id}', 'StaffController@showEnquiry');
	Route::post('enquiry/{id}/reply', 'StaffController@submitReply');

	Route::get('slider', 'StaffController@indexSlider');
	Route::post('slider', 'StaffController@storeSlider');
	Route::get('slider/create', 'StaffController@createSlider');
	Route::post('slider/remove/{id}', 'StaffController@removeSlider');
});