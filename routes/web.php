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
use Gloudemans\Shoppingcart\Facades\Cart;
Route::get('/', 'LandingPageController@index')->name('landing-page');
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
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

Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');

Route::get('/search', 'ShopController@search')->name('search');

Route::get('/login/{provider}', 'Auth\AuthSocialiteController@redirectToProvider');
Route::get('/login/{provider}/callback', 'Auth\AuthSocialiteController@handleProviderCallback');

Route::get('/orders', 'OrdersController@index')->name('orders.index');
//Route::get('/orders/{order}/reviews', 'OrdersController@index')->name('orders.index');

Route::get('/empty', function (){
    return view('test');
});

Route::get('/mailable', function (){
    $order = App\Order::find(1);

    return new App\Mail\OrderPlaced($order);
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
