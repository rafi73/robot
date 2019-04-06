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

Route::group(['prefix' => 'auth'], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register', 'AuthController@register');
});



Route::group(['middleware' => 'jwt.auth'], function ($router) {
    # 1.1 robot routes
    // List robot
    Route::get('robots', 'RobotController@index');
    // List single robot
    Route::get('robot/{id}', 'RobotController@show');
    // Create new robot
    Route::post('robot', 'RobotController@store');
    // Update robot
    Route::put('robot/{id}', 'RobotController@update');
    // Delete robot
    Route::delete('robot/{id}', 'RobotController@delete');
    // Create new robot
    Route::post('robot-bulk', 'RobotController@storeBulk');
});