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
        $email = \Auth::user()->email;
        $userId = \Auth::user()->id;
        $game = \App\Models\Game::Find($request['gameId']);
        $invited = $game->invited;
        $user_ids = $game->user_ids;


        $matchUserAndGame = ['game_id' => $game->id, 'user_id' => $userId];
        $knightExistsQuery = \App\Models\Knight::where($matchUserAndGame)->get()->first();
                                
        if ($knightExistsQuery != null)
        {
            $accessDeniedMessage = "You cannot create a character, because you have already made one for this group.";
            return redirect('/access-denied')->with('accessDeniedMessage', $accessDeniedMessage);
        }
        else if (in_array($email, $invited) || in_array($userId, $user_ids)) {
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
                'strength' => (int)$characterAtt['strength'],
                'dexterity' => (int)$characterAtt['dexterity'],
                'trainingDexterity' => 0,
                'constitution' => (int)$characterAtt['constitution'],
                'maxEndurance' => $endurance,
                'currentEndurance' => $endurance,
                'trainingPoints' => 0,
            ]);
    
            $game = \App\Models\Game::Find($characterAtt['gameId']);
            $game->knights()->save($knight);
    
            //If user creating character was in invited list, move them to existing users list
            if (($key = array_search($email, $invited)) !== false) {
                unset($invited[$key]);
    
                $player = \App\Models\User::All()->where('id', $userId)->first();
                $game->users()->save($player);
            }
    
            return redirect('character_created/'.$request['gameId']);
        }
        else {
            $accessDeniedMessage = "You cannot create a character, because you have not been invited to the group.";
            return redirect('/access-denied')->with('accessDeniedMessage', $accessDeniedMessage);
        }
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
