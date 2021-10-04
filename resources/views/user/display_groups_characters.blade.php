@extends('layouts.app')
<style>
    body {
        background-color: #080325e6;
    }
    table, th, td {
        border: 1px solid black;
        margin-bottom: 10px;
    }
    table {
        width: 100%;
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
        height: 280px;
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
        <div class="card mb-4">
            <div class="card-header">{{ __('Running Games') }}</div>
                <div class="card-body">
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
                            <?php $actionsDisabled = ($knights->where('game_id', $game->_id)->pluck('name')->first() == null) ? "disabled='disabled'" : '';?>
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
                                <td>
                                    @if ($knights->where('game_id', $game->_id)->pluck('name')->first() != null)
                                        <a class="btn btn-sm btn-secondary" type="button" href="/weeklyaction/{{$game->id}}">Prepare Your Week</a>
                                    @else
                                        <a class="btn btn-sm btn-secondary disabled" type="button" href="#">Prepare Your Week</a>
                                    @endif
                                </td>
                                <td><a class="btn btn-sm btn-secondary" type="button" href="#">Placeholder Link</a></td>
                                <td>
                                    <form action="/group-management/{{$game->id}}" method="GET">
                                        <input name="gameId" type="hidden" value = "{{$game->id}}"/>
                                        <button class="btn btn-sm btn-secondary" type="submit">Manage Group</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                    <a class="btn btn-primary mt-4" type="button" href="/create-group">{{ __('Create Game') }}</a>
                </div>
        </div>

        <div class="card">
            <div class="card-header">{{ __('Characters') }}</div>
                <div class="card-body">
                    <div class="scroll-table">
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
                    </div>

                    <!--<a class="btn btn-primary mt-2" type="button" href="/character">{{ __('Create Character') }}</a>-->
                </div>
        </div>
    </div>

@endsection