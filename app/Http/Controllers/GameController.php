<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Validator;
use Storage;

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

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:games,name',
            'genre' => 'string|required',
            'trailer_link' => 'url|required',
            'image' => 'file|mimes:png,jpg|required',
            'rating' => 'integer|required|min:1|max:5'
        ]);

        if($validator->fails()) {
          return response()->json(['message' => $validator->messages()->get('*')], 500);
        }

        Storage::disk('local')->putFileAs('/public/games', $request->file('image'), $request->file('image')->hashName());

        $game = Game::create([
          'name' => $request->input('name'),
          'genre' => $request->input('genre'),
          'trailer_link' => $request->input('trailer_link'),
          'image' => $request->file('image')->hashName(),
          'rating' => 4
        ]);

        return $game;
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

        Storage::disk('local')->putFileAs('public/', 'photo.jpg');
        Game::whereIn('id', $request->input('id'))->delete();

        return $this->index();
    }
}
