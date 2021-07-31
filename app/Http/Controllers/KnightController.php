<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KnightController extends Controller
{

    private $pronouns = array(
        'Male' => 'he/him',
        'Female' => 'she/her',
        'Them' => 'they/them',
    );

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
        $characterAtt = $request->validate([
            'gameId' => 'required',
            'character' => 'required',
            'gender' => 'required',
            'strength' => 'required|gte:3|lte:18',
            'dexterity' => 'required|gte:3|lte:18',
            'constitution' => 'required|gte:3|lte:18',
        ]);

        $endurance = $characterAtt['strength'] + $characterAtt['constitution'];

        $knight = auth()->user()->knights()->create([
            'name' => $characterAtt['character'],
            'level' => 1,
            'pronoun' => $this->pronouns[$characterAtt['gender']],
            'chivalryPoints' => 0,
            'strength' => $characterAtt['strength'],
            'dexterity' => $characterAtt['dexterity'],
            'trainingDexterity' => 0,
            'constitution' => $characterAtt['constitution'],
            'maxEndurance' => $endurance,
            'currentEndurance' => $endurance,
            'trainingPoints' => 0,
        ]);

        $game = \App\Models\Game::Find($characterAtt['gameId']);
        $game->knights()->save($knight);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
