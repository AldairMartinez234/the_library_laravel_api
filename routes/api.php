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
Route::get('thelibrary/list_book','App\Http\Controllers\BookController@index');
Route::post('thelibrary/add_book','App\Http\Controllers\BookController@store');
Route::put('thelibrary/update_book/{id}','App\Http\Controllers\BookController@update');
Route::delete('thelibrary/delete/{id}','App\Http\Controllers\BookController@destroy');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
