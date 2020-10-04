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

use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/store', 'HomeController@store')->name('store');


Route::get('/products', 'ProductController@index')->name('product.index');
Route::middleware('verify.admin')->get('/products/create', 'ProductController@create')->name('product.create');
Route::post('/products', 'ProductController@store')->name('product.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::delete('/products/{product}', 'ProductController@destroy')->name('product.remove');
    Route::put('/products/{product}', 'ProductController@update')->name('product.update');

    Route::get('/addToCart/{product}', 'ProductController@addToCart')->name('cart.add');
    Route::get('/shopping-cart', 'ProductController@showCart')->name('cart.show');

    Route::get('/checkout/{amount}', 'ProductController@checkout')->name('cart.checkout');

    Route::post('/charge', 'ProductController@charge')->name('cart.charge');

    Route::get('/orders', 'OrderController@index')->name('order.index');

});

Route::post('/search',function(){
    $q = request( 'q' );
    $products = Product::where('name','LIKE','%'.$q.'%')->orWhere('SKE','LIKE','%'.$q.'%')->get();
    if(count($products) > 0)
        return view('product.index', compact('products'));
    else return view ('welcome')->withMessage('No Details found. Try to search again !');
});

Auth::routes(['verify' => true]);