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
     * @OA\Post(
     *      path="/api/game/store",
     *      summary="Store a new game",
     *      description="Create game with Title, Game Type, and Number of Players",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              required={"name", "type", "noPlayers"},
     *              @OA\Property(
     *                  property="name", type="string", example="Adventures of the Braves"
     *              ),
     *              @OA\Property(
     *                  property="type", type="string", format="Game Type", example="Campaign"
     *              ),
     *              @OA\Property(
     *                  property="noPlayers", type="integer", example="7"
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation Fail"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     * )
     */
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
        
        $test = auth()->user()->games()->create([
            'name' => $request['name'],
            'type' => $request['type'],
            'noPlayers' => $request['noPlayers'],
            'currentRound' => 1,
            'resetDay' => "Thursday",
            'invited' => array(),
            'gameMaster' => $userId,
        ])->id;

        session([
            'gameName' => $request['name'],
            'noPlayers' => $request['noPlayers'],
            'id' => $test,
        ]);

        return response()->json(['success' => 'Game Made', 'route' => route('invite.create', null, false)], 201);
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
