<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;

Route::get('teams',[TeamController::class, 'index']);
Route::get('/teams/{team}',[TeamController::class, 'show']);
Route::post('/teams',[TeamController::class, 'store']);
Route::put('/teams/{team}',[TeamController::class, 'update']);
Route::delete('/teams/{team}',[TeamController::class, 'remove']);

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($routes) {
    Route::post('signup', [UserController::class, 'userRegister']);
    Route::post('signin', [UserController::class, 'userLogin']);
});
