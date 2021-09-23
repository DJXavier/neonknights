@extends('layouts.app')
<title>Invite User</title>

<?php
    $game = \App\Models\Game::Find($gameId);
?>

@section('content')
    <div class="container">
        <div class="card">
            <label class="card-header">Group Management - Invite User: {{$game->name}}</label>
            <div class="card-body">
                <p>{{session('updateMessage')}}</p>
                <form action="/group-management/{{$game->id}}" method="GET">
                    <input name="gameId" type="hidden" value ="{{$gameId}}"/>
                    <button class="btn btn-sm btn-secondary" type="submit">Manage Group</a>
                </form>
            </div>
        </div>
    </div>
@endsection