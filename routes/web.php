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
Route::get('/', 'LandingPageController@index')->name('landing-page');
Route::post('/newsletter', 'NewsletterController@store')->name('newsletter.store');
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/product/{product}', 'ShopController@show')->name('shop.show');
Route::patch('/categoryforfilter', 'shopController@categoryforfilter');
Route::post('/shop/filter', 'shopController@filters')->name('shop.filters');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');


Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/pay', 'CheckoutController@pay')->name('checkout.pay');
Route::post('/payWithStripe', 'CheckoutController@payWithStripe')->name('checkout.payWithStripe');
Route::post('/payWithPaypal', 'CheckoutController@payWithPaypal')->name('checkout.payWithPaypal');
Route::get('/payWithPaypal', 'CheckoutController@paypal')->name('checkout.paypal');

Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');

Route::get('/search', 'ShopController@search')->name('search');

Route::get('/login/{provider}', 'Auth\AuthSocialiteController@redirectToProvider')->name('login.whithProvider');
Route::get('/login/{provider}/callback', 'Auth\AuthSocialiteController@handleProviderCallback');


//Route::get('/orders/{order}/reviews', 'OrdersController@index')->name('orders.index');

Route::get('/empty', function (){
    return view('test');
});
Route::post('/empty', 'LandingPageController@test')->name('posttest');

Route::get('/mailable', function (){
    $order = App\Order::find(1);

    return new App\Mail\OrderPlaced($order);
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/my-profile', 'UsersController@edit')->name('users.edit');
    Route::patch('/my-profile', 'UsersController@update')->name('users.update');

    Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
});
