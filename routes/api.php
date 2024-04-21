<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;

Route::get('teams',[TeamController::class, 'index']);
Route::get('/teams/{team}',[TeamController::class, 'show']);
Route::post('/teams',[TeamController::class, 'store']);
Route::put('/teams/{team}',[TeamController::class, 'update']);
Route::delete('/teams/{team}',[TeamController::class, 'remove']);