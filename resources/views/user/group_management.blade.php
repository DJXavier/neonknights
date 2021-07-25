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
                        <form method="POST" action="{{ route('game.update') }}">
                            @csrf
                            <div class="col-md-2">
                                <h3>Size</h3>
                                <div class>
                                    <label for="update_size">Update Size:</label>
                                    <input id="update_size" type="number" class="form-control" min="4" max="12" value='{{$game->noPlayers}}'/>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3" type="button" id="update">Update Size</button>
                            </div>
                        </form>
                        <form method="POST" action="{{ route('invite.property') }}">
                            @csrf
                            <div class="col-md-4">
                                <h3>Send Invite</h3>
                                <div>
                                    <label for="email">Email:</label>
                                    <input id="email" type="text" class="form-control" name="email" />
                                </div>
                                <button class="btn btn-primary mt-3" type="submit" id="send">Send Invitation</button>
                            </div>
                        </form>
                    <div class="col-md-6">
                        <h1>Invitation List</h1>
                        <table>
                            <tr>
                                <th>Email</th>
                                <th>Invite Status</th>
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
                                }?>

                                <tr>
                                    <td>{{$game->users()->where('_id', $user)->pluck('email')->first()}}</td>
                                    <td>{{$status}}</td>
                                </tr>

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