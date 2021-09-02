<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadTurmaController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\LoginPostController;


#rota Login
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

Route::middleware('auth:api')->group(function(){
    #rota Login
    Route::resource('posts', LoginPostController::class);

    #Rota turma
    Route::apiResource('turmas', 'App\Http\Controllers\CadTurmaController');

    #Rota Tag
    Route::apiResource('tags', 'App\Http\Controllers\TagController');
});
