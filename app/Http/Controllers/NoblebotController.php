<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoblebotController extends Controller
{
    //

    public function getBots($gameId)
    {
        $game = \App\Models\Game::FindOrFail($gameId);
        $bots = $game->noblebots()->get();

        return response()->json([
            'noblebots' => $bots
        ], 200);
    }
}
