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

// Route::post('register', 'API\RegisterController@register');

  

// Route::middleware('auth:api')->group( function () {

// 	Route::resource('products', 'API\ProductController');

// });

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('user-register','API\UserController@register');
Route::post('user-login','API\UserController@login');
Route::group(['middleware' => ['web']], function () {
    Route::get('login/{provider}/callback','API\SocialController@Callback');
    Route::get('login/{provider}', 'API\SocialController@redirect');
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/user', 'UserController@index');
});