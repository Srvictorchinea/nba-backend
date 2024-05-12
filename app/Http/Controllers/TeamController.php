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

    public function show(Team $team)
    {
        return $team;
    }

    public function store(Request $request)
    {
        $team = Team::create($request->all());
        return response()->json($team, status: 201);
    }

    public function update(Request $request, Team $team)
    {
        $team->update($request->all());
        return response()->json($team, status: 200);
    }

    public function remove(Request $request, Team $team)
    {
        $team->delete();
        return response()->json(data: null, status: 204);
    }
}
