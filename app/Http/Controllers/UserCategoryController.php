<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TeamTeaTime\Forum\Models\Category;
use TeamTeaTime\Forum\Http\Requests\CreateCategory;

class UserCategoryController extends Controller
{
    public function store(CreateCategory $request) {
        $gameId = $request['game_id'];


        $category = $request->fulfill();
        $responseCode = 403;
        $responseVar = ['Forbidden', 'Did not actvate'];

        if ($category != null) {
            $responseCode = 200;
            $responseVar = ['Success' => 'Forum created'];

            $game = \App\Models\Game::Find($gameId);
            $game->forumId = $category->id;
            $game->save();
        }

        $check = $category->id;
        return response()->json($responseVar, $responseCode);
    }
}
