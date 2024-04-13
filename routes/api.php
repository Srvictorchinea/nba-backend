<?php

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/teams', function () {
    return Team::all(); 
});

Route::get('/teams/{id}', function ($id) {
    return Team::find($id);
});

Route::post('/teams', function (Request $request) {
    return Team::create($request->all);
});

Route::put('/teams/{id}', function (Request $request, $id) {
    $team = Team::findOrFail($id);
    $team->update($request->all());
    return $team;
});

Route::delete('team/{id}', function ($id) {
    Team::find($id)->delete();
    return 204;
});
