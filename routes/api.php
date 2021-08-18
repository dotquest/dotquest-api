<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\CadTurmaController;
use App\Http\Controllers\TagController;


#Rota turma
Route::apiResource('turmas', 'App\Http\Controllers\CadTurmaController');

#Rota Tag
Route::apiResource('tags', 'App\Http\Controllers\TagController');

