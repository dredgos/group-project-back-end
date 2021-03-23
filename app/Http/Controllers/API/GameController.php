<?php

namespace App\Http\Controllers\API;
use App\Http\Resources\API\GameResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Http\Resources\API\GameResource;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Game::all();       
    }

    public function gameRecs(Request $request)
    {
         //access data fom the request
        $difficulty = $request->input('difficulty');
        $players = $request->input('players');
        $time = $request->input('time');
        
        //search database using request data
        //return games that match
        return Game::where([
            ['difficulty', '=', $difficulty],
            ['min_players', '<=', $players],
            ['max_players', '>=', $players],
            ['time', '<=', $time]
        ])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameRequest $request)
    {
        $data = $request->all();

        // use the new method
        $game = Game::create($data)->setGenres($request->get("genres"));

        return new GameResource($game);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return $game;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GameRequest $request, Game $game)
    {
        // update the article first
        $data = $request->all();
        $game->fill($data)->save();

        // use the new method - can't chain as save returns a bool
        $article->setGenres($request->get("genres"));

        return new GameResource($game);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
