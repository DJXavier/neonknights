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
    $game = \App\Models\Game::Find($gameId);//Auth::user()->games()->where('_id', $gameId)->first();
?>

@section('content')

    <div class="container">
        <div class="card">
            <label class="card-header">Group Management: {{$game->name}}</label>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <h3>Size</h3>
                        <div class>
                            <label for="update_size">Update Size:</label>
                            <input id="update_size" type="number" class="form-control" min="4" max="12"/>
                        </div>
                        <a class="btn btn-primary mt-3" type="button" href="#">Update Size</a>
                    </div>
                    <div class="col-md-4">
                        <h3>Send Invite</h3>
                        <div>
                            <label for="email">Email:</label>
                            <input id="email" type="text" class="form-control" name="email" />
                        </div>
                        <a class="btn btn-primary mt-3" type="button" href="#">Send Invitation</a>
                    </div>
                    <div class="col-md-6">
                        <h1>Invitation List</h1>
                        <table>
                            <tr>
                                <th>Email</th>
                                <th>Invite Status</th>
                            </tr>

                            @foreach ($game->user_ids as $user)
                            <tr>
                                <td>{{$game->users()->where('_id', $user)->pluck('email')}}</td>
                                <td>Test</td>
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