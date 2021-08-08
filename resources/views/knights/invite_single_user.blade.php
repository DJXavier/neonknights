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
                <a class="btn btn-sm btn-secondary" type="button" href="/group-management/{{$game->id}}">Manage Group</a>
            </div>
        </div>
    </div>
@endsection