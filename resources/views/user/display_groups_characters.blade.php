@extends('layouts.app')
<style>
    table, th, td {
        border: 1px solid black;
        margin-bottom: 10px;
    }
    table {
        width: 100%;
        height: 250px;
        border-collapse: collapse;
    }
    th, td {
        padding: 5px;
    }
    a.btn {
        margin-bottom: 10px;
    }
    .scroll-table {
        overflow-y :scroll;
    }
    .wd-75 {
        width: 75px;
    }
    .wd-100 {
        width: 100px;
    }
    .wd-125 {
        width: 125px;
    }
</style>
<title>Display Characters</title>

<?php
    $games = Auth::user()->games()->where('user_ids', Auth::user()->_id)->get();
    $knights = Auth::user()->knights()->where('user_id', Auth::user()->_id)->get();
?>

@section('content')

    <div class="container">
        <h1>
            Running Games
        </h1>
        <div class="scroll-table">
        <table>
            <tr>
                <th class="wd-75">Actions Entered</th>
                <th>Group Name</th>
                <th>Character</th>
                <th>Current Round</th>
                <th>Type</th>
                <th>No. of Players</th>
                <th>Reset Date</th>
                <th class="wd-125">(Re)Select Weekly Actions</th>
                <th class="wd-100">Group Forum</th>
                <th class="wd-100">Manage Group</th>
            </tr>

            @foreach ($games as $game)
                <tr>
                    <td>
                        <input class="actions-entered" type="checkbox" value="" id="actionsEntered" disabled>
                    </td>
                    <td>{{$game->name}}</th>
                    <td>{{$knights->where('game_id', $game->_id)->pluck('name')->first()}}</th>
                    <td>{{$game->currentRound}}</th>
                    <td>{{$game->type}}</th>
                    <td>{{$game->noPlayers}}</th>
                    <td>{{$game->resetDate}}</th>
                    <td><a class="btn btn-sm btn-secondary my-0" type="button" href="/insert-weekly-actions">Placeholder Link</a></td>
                    <td><a class="btn btn-sm btn-secondary my-0" type="button" href="#">Placeholder Link</a></td>
                    <td><a class="btn btn-sm btn-secondary my-0" type="button" href="group-management/{{$game->id}}">Manage Group</a></td>
                </tr>
            @endforeach
        </table>
        </div>

        <a class="btn btn-primary mt-2 mb-5" type="button" href="/create-group">{{ __('Create Group') }}</a>

        <h1>
            Characters
        </h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Pronouns</th>
                <th>Strength</th>
                <th>Dexterity</th>
                <th>Constitution</th>
                <th>Max Endurance</th>
                <th>Level</th>
                <th>Dex Trained</th>
                <th>Training Points</th>
            </tr>

            @foreach ($knights as $knight)
                <tr>
                    <td>{{$knight->name}}</th>
                    <td>{{$knight->pronoun}}</th>
                    <td>{{$knight->strength}}</th>
                    <td>{{$knight->dexterity}}</th>
                    <td>{{$knight->constitution}}</th>
                    <td>{{$knight->maxEndurance}}</th>
                    <td>{{$knight->level}}</th>
                    <td>{{$knight->trainingDexterity}}</th>
                    <td>{{$knight->trainingPoints}}</th>
                </tr>
            @endforeach
        </table>

        <a class="btn btn-primary mt-2" type="button" href="#">{{ __('Create Character') }}</a>
    </div>

@endsection