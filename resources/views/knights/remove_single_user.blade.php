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
                <p>{{session('removeMessage')}}</p>
                <a class="btn btn-sm btn-secondary" type="button" href="/group-management/{{$game->id}}">Manage Group</a>
            </div>
        </div>
    </div>
@endsection