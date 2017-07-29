<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::resource('buyers', 'Buyer\BuyerController', ['only' => ['index', 'show']]);
Route::resource('categories', 'Category\CategoryController', ['except' => ['create', 'edit']]);
Route::resource('products', 'Product\ProductController', ['only' => ['index', 'show']]);
Route::resource('sellers', 'Seller\SellerController', ['only' => ['index', 'show']]);
Route::resource('transactions', 'Transaction\TransactionController', ['except' => ['create', 'edit']]);
Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);