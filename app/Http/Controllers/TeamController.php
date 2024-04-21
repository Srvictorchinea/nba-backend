<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

final class TeamController extends Controller
{
    public function index()
    {
        return Team::all();
    }

    public function show($id)
    {
        return Team::find($id);
    }

    public function store(Request $request)
    {
        return Team::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $team->update($request->all());
        return $team;
    }

    public function delete(Request $request, $id)
    {
        $team = Team::findOrfail($id);
        $team->delete();
        return 204;
    }
}
