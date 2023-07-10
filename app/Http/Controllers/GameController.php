<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::orderBy('created_at', 'desc')->get();

        return $games;
    }

    public function search(Request $request) {
      $games = Game::where('name', 'LIKE', '%'. $request->input('query') . '%')->get();

      return $games;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $games = Game::whereIn('id', $request->input('id'))->delete();
        return response()->json(['message' => 'deleted'], 200);
    }
}
