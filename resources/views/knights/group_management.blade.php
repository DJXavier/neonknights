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
    .cell_fill {
        background-color: black;
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
                <div class="row">
                    <div class="col-md-2">
                        <h3>Size</h3>
                        <form action="{{ route('game.update') }}" method="POST">
                            <div>
                            @csrf
                                <label for="size_label">Update Size:</label>
                                <input id="gameId" name="gameId" type="hidden" value = "{{$gameId}}"/>
                                <input id="size" name="size" type="number" class="form-control" min="4" max="12" value="{{$game->noPlayers}}"/>
                            </div>  
                            <button class="btn btn-primary mt-3" type="submit">Update Size</button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <h3>Send Invite</h3>
                        <form action="{{ route('invite.updateSingle') }}" method="POST">
                            <div>
                            @csrf
                                <input id="thisId" name="thisId" type="hidden" value ="{{$gameId}}""/>
                                <label for="email">Email:</label>
                                <input id="email" name="email" type="text" class="form-control" value=""/>
                            </div>
                            <button class="btn btn-primary mt-3" type="submit">Send Invitation</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h1>User List</h1>
                        <table>
                            <tr>
                                <th>Email</th>
                                <th class="wd-125">Invite Status</th>
                            </tr>

                            <tr>
                                <td>{{$game->users()->where('_id', $game->gameMaster)->pluck('email')->first()}}</td>
                                <td class="cell_fill"></td>
                            </tr>

                            @foreach ($game->user_ids as $user)
                                <?php
                                $matchUserAndGame = ['game_id' => $gameId, 'user_id' => $user];
                                $knightExistsQuery = \App\Models\Knight::where($matchUserAndGame)->get()->first();
                                
                                if ($knightExistsQuery == null)
                                {
                                    $status = "Pending";
                                }
                                else
                                {
                                    $status = "Accepted";
                                }
                                
                                if ($user != $game->gameMaster)
                                {
                                ?>

                                <tr>
                                    <td>{{$game->users()->where('_id', $user)->pluck('email')->first()}}</td>
                                    <td>{{$status}}</td>
                                </tr>

                                <?php } ?>
                            @endforeach

                            @foreach ($game->invited as $user)
                                <tr>
                                    <td>{{$user}}</td>
                                    <td>Pending</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <a class="btn btn-success btn-lg mt-2" type="button" href="#">Start Game</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection