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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::get('register', 'App\Http\Controllers\AuthenticationController@register');
    Route::post('login', 'App\Http\Controllers\AuthenticationController@login');
    Route::post('logout', 'App\Http\Controllers\AuthenticationController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthenticationController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthenticationController@me');

});

Route::group([
    'prefix' => 'item'
], function ($router){
    Route::get('get-all', 'App\Http\Controllers\ItemController@getAllItems');
});

Route::group([
    'prefix' => 'table'
], function ($router){
    Route::get('get-all', 'App\Http\Controllers\TableController@getAllTables');
});

Route::get('add-tables', 'App\Http\Controllers\TableController@addTables');

Route::get('check', 'App\Http\Controllers\TestController@index');
