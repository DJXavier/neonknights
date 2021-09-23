@extends('layouts.app')
<title>Remove User</title>

<?php
    $game = \App\Models\Game::Find($gameId);
?>

@section('content')
    <div class="container">
        <div class="card">
            <label class="card-header">Group Management - Remove User: {{$game->name}}</label>
            <div class="card-body">
                <p>
                    Invite disabled for {{session('email')}}
                    <br>User has been removed from the group.
                </p>
                <form action="/group-management/{{$game->id}}" method="GET">
                    <input name="gameId" type="hidden" value ="{{$gameId}}"/>
                    <button class="btn btn-sm btn-secondary" type="submit">Manage Group</a>
                </form>
            </div>
        </div>
    </div>
@endsection