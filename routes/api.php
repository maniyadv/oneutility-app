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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1', 'namespace' => 'API'], function () {

    // public routes
    Route::post('/login', 'AuthController@login')->name('login.api');
    Route::post('/register', 'AuthController@register')->name('register.api');

    // private routes
    Route::middleware('auth:api')->group(function () {
        Route::get('/logout', 'AuthController@logout')->name('logout');

        // API routes for pricing
        Route::get('/prices', 'ProductPriceController@show')->name('product.prices');

    });

});

