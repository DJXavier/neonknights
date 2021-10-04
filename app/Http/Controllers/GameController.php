<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|Min:5|Max:20|',
            'type'=> 'required',
            'noPlayers' => 'required'
        ],
        [
            'name.required' => 'Game Name is required. (At least 5 letters and no more than 20 letters)',
            'type.required' => 'You need to select Game type.',
            'noPlayers.required' => 'You need to select Number of players.'
        ]);

        $userId = auth()->user()->id;
        $gameType = ucfirst($request['type']);
        
        $gameId = auth()->user()->games()->create([
            'name' => $request['name'],
            'type' => $gameType,
            'noPlayers' => (int)$request['noPlayers'],
            'currentRound' => 1,
            'resetDate' => "Thursday",
            'invited' => array(),
            'gameMaster' => $userId,
        ])->id;

        return response()->json([
            'redirectPath' => route('invite.create', ['gameId' => $gameId]),
            'gameId' => $gameId,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Game::Find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function getJoustingOpponents($gameId, $knightId)
    {
        $game = \App\Models\Game::FindOrFail($gameId);

        $joustable = $game->knights()->where('_id', '!=', $knightId)->get();

        return response()->json([
            'knights' => $joustable,
        ], 200);
    }
}
