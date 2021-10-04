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
        height: 470px;
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
<title>Display Directing Games</title>

<?php
    $games = \App\Models\Game::All();
?>

@section('content')

    <div class="container">
        <div class="card mb-4">
            <div class="card-header">{{ __('Directing Games') }}</div>
                <div class="card-body">
                    <div class="scroll-table">
                        <table>
                        <tr>
                            <th>Group Name</th>
                            <th>Current Round</th>
                            <th>No. of Players</th>
                            <th>Reset Date</th>
                            <th class="wd-100">Group Forum</th>
                            <th class="wd-100">View Group</th>
                        </tr>

                        @foreach ($games as $game)
                            <tr>
                                <td>{{$game->name}}</th>
                                <td>{{$game->currentRound}}</th>
                                <td>{{$game->noPlayers}}</th>
                                <td>{{$game->resetDate}}</th>
                                <td><a class="btn btn-sm btn-secondary" type="button" href="#">Placeholder Link</a></td>
                                <td>
                                    <form action="director-management/{{$game->id}}/" method="GET">
                                        <input name="gameId" type="hidden" value = "{{$game->id}}"/>
                                        <button class="btn btn-sm btn-secondary" type="submit">View Group</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection