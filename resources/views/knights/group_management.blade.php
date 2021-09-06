@extends('layouts.app')
<style>
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
    .wd-125 {
        width: 125px;
    }
</style>
<title>Group Management</title>

<?php
    $game = \App\Models\Game::Find($gameId);
?>

@section('content')
    <div class="container">
        <div class="card">
            <label class="card-header">Group Management: {{$game->name}}</label>
            <div class="card-body">
            <?php 
                $maxGroupSize = 12;
            ?>
                <div class="row">
                    <div class="col-md-4">
                        <h1>Send Invite</h1>
                        <form action="{{ route('invite.updateSingle') }}" method="POST">
                            <div>
                            @csrf
                            <input name="gameId" type="hidden" value ="{{$gameId}}"/>
                                <label for="email">Email:</label>
                                <input id="email" name="email" type="text" class="form-control" value=""/>
                            </div>
                            <button class="btn btn-primary mt-3" type="submit">Send Invitation</button>
                        </form>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <a class="btn btn-success btn-lg float-left mt-2" type="button" href="#">Start Game</a>
                                <form action="{{ route('invite.deleteGroup') }}" method="POST">
                                    @csrf
                                    <input name="gameId" type="hidden" value ="{{$gameId}}"/>
                                    <button class="btn btn-danger btn-lg float-right mt-2" type="submit">Delete Group</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="float-left">
                            <h1>User List</h1>
                        </div>
                        <div class="float-right">
                            <h1>{{$game->noPlayers}}  / {{$maxGroupSize}}</h1>
                        </div>
                        <table>
                            <tr>
                                <th>Email</th>
                                <th class="wd-125">Invite Status</th>
                                <th class="wd-125">Remove Invite</th>
                            </tr>

                            <?php
                                $matchUserAndGame = ['game_id' => $gameId, 'user_id' => Auth::user()->id];
                                $knightExistsQuery = \App\Models\Knight::where($matchUserAndGame)->get()->first();
                                
                                if ($knightExistsQuery == null)
                                {
                                    $status = "No Character";
                                }
                                else
                                {
                                    $status = "Ready";
                                }
                            ?>

                            <tr>
                                <td>{{$game->users()->where('_id', $game->gameMaster)->pluck('email')->first()}}</td>
                                <td class="bg-dark text-white">{{$status}}</td>
                                <td class="bg-dark text-white">Game Master</td>
                            </tr>

                            @foreach ($game->user_ids as $user)
                                <?php
                                $matchUserAndGame = ['game_id' => $gameId, 'user_id' => $user];
                                $knightExistsQuery = \App\Models\Knight::where($matchUserAndGame)->get()->first();
                                
                                if ($knightExistsQuery == null) {
                                    $status = "Pending";
                                }
                                else {
                                    $status = "Ready";
                                }
                                
                                if ($user != $game->gameMaster)
                                {
                                ?>

                                <tr>
                                    <td>{{$game->users()->where('_id', $user)->pluck('email')->first()}}</td>
                                    <td>{{$status}}</td>
                                    <td>
                                        <form action="{{ route('invite.removeSingle') }}" method="POST">
                                            @csrf
                                            <input name="gameId" type="hidden" value ="{{$gameId}}"/>
                                            <input name="userId" type="hidden" value = "{{$user}}"/>
                                            <input name="email" type="hidden" value="{{$game->users()->where('_id', $user)->pluck('email')->first()}}"/>
                                            <button class="btn btn-sm btn-secondary" type="submit">Remove User</button>
                                        </form>
                                    </td>
                                </tr>

                                <?php } ?>
                            @endforeach

                            @foreach ($game->invited as $user)
                                <tr>
                                    <td>{{$user}}</td>
                                    <td>Pending</td>
                                    <td>
                                        <form action="{{ route('invite.removeSingle') }}" method="POST">
                                            @csrf
                                            <input name="gameId" type="hidden" value ="{{$gameId}}"/>
                                            <input name="userId" type="hidden" value = ""/>
                                            <input name="email" type="hidden" value="{{$user}}"/>
                                            <button class="btn btn-sm btn-secondary" type="submit">Remove User</button>
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