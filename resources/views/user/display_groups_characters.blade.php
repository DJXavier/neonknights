@extends('layouts.app')
<style>
    table, th, td {
        border: 1px solid black;
        margin-bottom: 10px;
    }
    table {
        width: 70%;
        border-collapse: collapse;
    }
    th, td {
        padding: 5px;
    }
    .pageContent {
        padding-left: 30px;
    }
    a.btn {
        margin-bottom: 10px;
    }
</style>
<title>Display Characters</title>

<?php
    $games = Auth::user()->games()->where('user_ids', Auth::user()->_id)->get();
    $knights = Auth::user()->knights()->where('user_id', Auth::user()->_id)->get();
?>

@section('content')

    <div class="pageContent">
       
        <h1>
            Running Games
        </h1>
        <table>
            <tr>
                <th>Actions Entered</th>
                <th>Group Name</th>
                <th>Character</th>
                <th>Current Round</th>
                <th>Type</th>
                <th>No. of Players</th>
                <th>Reset Date</th>
                <th>(Re)Select Weekly Actions</th>
                <th>Group Forum</th>
            </tr>
            
                
                @foreach ($games as $game)
                    <tr>
                        <td>
                            <div class="actions-entered"><input class="actions-entered" type="checkbox" value="" id="actionsEntered" disabled></div>
                        </td>
                        <td>{{$game->name}}</th>
                        <td>{{$knights->where('game_id', $game->_id)->pluck('name')->first()}}</th>
                        <td>{{$game->currentRound}}</th>
                        <td>{{$game->type}}</th>
                        <td>{{$game->noPlayers}}</th>
                        <td>{{$game->resetDate}}</th>
                        <form action="{{ route('selectGroup.next') }}" method="POST">
                            @csrf 
                            @foreach ($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>   
                            @endforeach 
                            <?php 
                                $thisId = $game->_id ;
                                echo '<input value ="' . $thisId . '"' . 'type="hidden" name="thisId" id="thisId">';
                            ?>
                            <th><input type="submit" id="button" name="button">Action Now!</input></th>
                        </form>   
                        <th><a href="#">Placeholder Link</a></th>
                    </tr>
                @endforeach
            
        </table>

        <a class="btn btn-primary" type="button" href="/create-group">{{ __('Create Group') }}</a>

        <h1>
            Characters
        </h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Pronouns</th>
                <th>Strength</th>
                <th>Dexterity</th>
                <th>Constitution</th>
                <th>Max Endurance</th>
                <th>Level</th>
                <th>Dex Trained</th>
                <th>Training Points</th>
            </tr>

            @foreach ($knights as $knight)
                <tr>
                    <td>{{$knight->name}}</th>
                    <td>Sample Pronouns</th>
                    <td>{{$knight->strength}}</th>
                    <td>{{$knight->dexterity}}</th>
                    <td>{{$knight->constitution}}</th>
                    <td>{{$knight->maxEndurance}}</th>
                    <td>{{$knight->level}}</th>
                    <td>{{$knight->trainingDexterity}}</th>
                    <td>{{$knight->trainingPoints}}</th>
                </tr>
            @endforeach
        </table>

        <a class="btn btn-primary" type="button" href="#">{{ __('Create Character') }}</a>
       
    </div>

@endsection