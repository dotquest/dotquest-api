<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
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
#Route::resource('tags','App\Http\Controllers\TagController');
#Route::put('api/{id}', function($id){

#});



#Route::get('tags', 'App\Http\Controllers\TagController@index');
#Route::post('tags', 'App\Http\Controllers\TagController@store');

Route::apiResource('tags', 'App\Http\Controllers\TagController');