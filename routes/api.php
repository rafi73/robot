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
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
   
});

Route::group(['prefix' => 'v1', 'middleware' => 'jwt.auth'], function ($router) {
    # 1.1 robot routes
    Route::get('robots', 'RobotController@index');
    Route::get('robot/{id}', 'RobotController@show');
    Route::post('robot', 'RobotController@store');
    Route::put('robot/{id}', 'RobotController@update');
    Route::delete('robot/{id}', 'RobotController@delete');
    Route::post('robot-bulk', 'RobotController@storeBulk');
    Route::get('fight-robots', 'RobotController@getFightRobots');

    # 1.2 fight routes
    Route::post('start-fight', 'FightController@startFight');
});

Route::group(['prefix' => 'v1'], function ($router) {
    # 1.3 home routes
    Route::get('home', 'HomeController@getHomeData');
});