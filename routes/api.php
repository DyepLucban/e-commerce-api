<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/login', 'AuthController@login');
Route::resource('/user', 'UserController');
Route::post('/logout', 'AuthController@logout')->middleware('auth:sanctum');
Route::resource('/send-email', 'EmailController');

Route::middleware('auth:sanctum')->group(function () {
	Route::get('/auth_user', 'AuthController@getAuthUser');
	Route::resource('/product', 'ProductController');
	Route::resource('/cart', 'CartController');
	Route::resource('/order', 'OrderController');
});
