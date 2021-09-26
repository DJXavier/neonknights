@extends('layouts.app')

<style>
    .groupSizeValue
    {
        text-align: right;
    }
</style>
                  

                
<title>Select Actions</title>
@section('content')
<?php
    $game = \App\Models\Game::Find($id);
    $knight = $game->knights()->where('user_id', auth()->user()->id)->get()->first();
?>
<div id="action-page">
    <input type="hidden" id="game-id" value={{ $game->id }} />
    <input type="hidden" id="knight-id" value={{ $knight->id }} />
    <input type="hidden" id="game-name" value={{ $game->name }} />
</div>
<form action="/submittedweeklyaction/{{ $game->id }}" method="POST" id="action-post">
    @csrf
        <div id="action-one">
        <input type="hidden" value="" id="one-type" name="one-type"/>
        <input type="hidden" value="" id="one-length" name="one-length"/>
        <input type="hidden" value="" id="one-joust-accept" name="one-joust-accept"/>
        <input type="hidden" value="" id="one-target" name="one-target"/>
        <input type="hidden" value="" id="one-entry" name="one-entry"/>
        <input type="hidden" value="" id="one-time" name="one-time"/>
    </div>
    <div id="action-two">
        <input type="hidden" value="" id="two-type" name="two-type"/>
        <input type="hidden" value="" id="two-length" name="two-length"/>
        <input type="hidden" value="" id="two-joust-accept" name="two-joust-accept"/>
        <input type="hidden" value="" id="two-target" name="two-target"/>
        <input type="hidden" value="" id="two-entry" name="two-entry"/>
        <input type="hidden" value="" id="two-time" name="two-time"/>
    </div>
    <div id="action-three">
        <input type="hidden" value="" id="three-type" name="three-type"/>
        <input type="hidden" value="" id="three-length" name="three-length"/>
        <input type="hidden" value="" id="three-joust-accept" name="three-joust-accept"/>
        <input type="hidden" value="" id="three-target" name="three-target"/>
        <input type="hidden" value="" id="three-entry" name="three-entry"/>
        <input type="hidden" value="" id="three-time" name="three-time"/>
    </div>
</form>
<div id="knight-game">

</div>

@endsection
