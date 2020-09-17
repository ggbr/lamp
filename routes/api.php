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

Route::prefix('user/')->group(function(){

    Route::post('/', 'UserController@create');
    Route::post('/create', 'UserController@create'); 

    Route::post('/login', 'UserController@login');

    Route::post('/login-code', 'UserController@loginCode');
    Route::post('/validate-code', 'UserController@validateCode')->middleware('validateEmail');
   
    Route::get('/valid-email/{email}', 'UserController@existEmail');

    Route::post('/login-social-google', 'UserController@loginRedesocialGoogle');
    Route::post('/login-social-facebook', 'UserController@loginRedesocialFacebook');


    Route::group(['middleware' => ['auth:api']], function () {
      Route::put('/new-password','UserController@newPassword');
      Route::get('/', 'UserController@userByToken');
      Route::put('/', 'UserController@update');
    });
    
});