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
    .scroll-table {
        overflow-y :scroll;
        height: 470px;
    }
</style>
<title>Display Group</title>

<?php
    $game = \App\Models\Game::Find($gameId);
    $weeks = \App\Models\Week::where('game_id', $gameId)->get();
    $weeks = $weeks->sortBy('week_no');
?>

@section('content')

    <div class="container">
        <div class="card mb-4">
            <div class="card-header">Directing Group: {{$game->name}}</div>
                <div class="card-body">
                    <div class="scroll-table">
                        <table>
                        <tr>
                            <th>Week Number</th>
                            <th>View Week</th>
                        </tr>

                        @foreach ($weeks as $week)
                            <tr>
                                <td>{{$week->week_no}}</th>
                                <td>
                                    <form action="/director-management/{{$game->id}}/{{$week->week_no}}" method="GET">
                                        <input name="gameId" type="hidden" value = "{{$game->id}}"/>
                                        <input name="weekNo" type="hidden" value = "{{$week->week_no}}"/>
                                        <button class="btn btn-sm btn-secondary" type="submit">View Week</button>
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