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
</style>
<title>Update Size</title>

<?php
    $game = \App\Models\Game::Find($gameId);
?>

@section('content')
    <div class="container">
        <div class="card">
            <label class="card-header">Group Management - Update Size: {{$game->name}}</label>
            <div class="card-body">
                <p>{{session('updateMessage')}}</p>
            </div>
        </div>
    </div>
@endsection