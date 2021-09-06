@extends('layouts.app')

<title>Display User Actions</title>

<?php
    $game = \App\Models\Game::Find($gameId);
    $weeks = \App\Models\Week::where('game_id', $gameId)->get();
    $week = $weeks->where('week_no', $weekNo)->first();
?>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Directing Group: {{$game->name}} - Week {{$weekNo}}</div>

                <div class="card-body">
                    User actions page
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
