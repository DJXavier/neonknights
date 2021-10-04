@extends('layouts.app')
<title>Character Created</title>

<?php
    $game = \App\Models\Game::Find($gameId);
    $userId = \Auth::user()->id;

    $matchUserAndGame = ['game_id' => $game->id, 'user_id' => $userId];
    $knight = \App\Models\Knight::where($matchUserAndGame)->get()->first();
?>

@section('content')
    <div class="container">
        <div class="card">
            <label class="card-header">Character Created: {{$game->name}}</label>
            <div class="card-body">
                <p>Your Knight, {{$knight->name}}, has successfully been created for the game.</p>
                <a class="btn btn-sm btn-secondary" type="button" href="/display-groups-characters">Display Games & Characters</a>
            </div>
        </div>
    </div>
@endsection