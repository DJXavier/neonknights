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
</style>
<title>Display Week</title>

<?php
    $game = \App\Models\Game::Find($gameId);
    $weeks = \App\Models\Week::where('game_id', $gameId)->get();
    $week = $weeks->where('week_no', $weekNo)->first();
    $actions = $week->actions;
    $storeKnightIds = [];
?>

@section('content')

    <div class="container">
        <div class="card mb-4">
            <div class="card-header">Directing Group: {{$game->name}} - Week {{$weekNo}}</div>
                <div class="card-body">
                    <div class="scroll-table">
                        <table>
                        <tr>
                            <th>Knight</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Actions Entered</th>
                        </tr>

                        @foreach ($actions as $action)
                            @if (!in_array($action->knight->user_id, $storeKnightIds))
                            <?php
                                array_push($storeKnightIds, $action->knight->user_id);
                                $user = \App\Models\User::Find($action->knight->user_id);
                                $userName = $user->name;
                                $userEmail = $user->email;  
                            ?>

                            <tr>
                                <td>{{$action->knight->name}}</td>
                                <td>{{$userName}}</td>
                                <td>{{$userEmail}}</td>
                                <td>
                                    <form action="/director-management/{{$game->id}}/{{$week->week_no}}/{{$action->knight->id}}" method="GET">
                                        <input name="gameId" type="hidden" value = "{{$game->id}}"/>
                                        <input name="weekNo" type="hidden" value = "{{$week->week_no}}"/>
                                        <input name="knightId" type="hidden" value = "{{$action->knight->id}}"/>
                                        <button class="btn btn-sm btn-secondary" type="submit">View Actions</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection