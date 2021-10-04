@extends('layouts.app')

<title>Display User Actions</title>

<?php
    $game = \App\Models\Game::Find($gameId);
    $weeks = \App\Models\Week::where('game_id', $gameId)->get();
    $week = $weeks->where('week_no', $weekNo)->first();
    $actions = $week->actions;
    $knightActions = [];

    foreach($actions as $action) {
        if ($action->knight()->get()->id == $knightId) {
            array_push($knightActions, $action);
        }
    }
?>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Directing Group: {{$game->name}} - Week {{$weekNo}}</div>

                <div class="card-body">
                    <h1><strong>Knight: {{$knightActions[0]->knight->name}}</strong></h1>
                    @foreach ($knightActions as $knightAction)
                    <div class="card">
                        <div class="container">
                            @if ($knightAction->type == 7)
                                <h1>Poem</h1>
                                <textarea className="form-control" id="poem-area-edit" style="min-width: 100%" rows = "4" readonly><?php echo $knightAction->poem ?></textarea>
                            @elseif ($knightAction->type == 5)
                                <h1>Joust</h1>
                                <p>Knight - {{$knightAction->knight()->get()->name}}</p>
                            @elseif ($knightAction->type == 3)
                                <?php $gender = ($knightAction->noblebot()->get()->gender == 1) ? "Male" : "Female"; ?>
                                <h1>Flirt</h1>
                                <p>Noblebot - {{$knightAction->noblebot()->get()->name}}<br></p>
                                <p>- Level: {{$knightAction->noblebot()->get()->level}}<br></p>
                                <p>- Gender: {{$gender}}</p>
                            @else
                                <?php
                                    $actionType = null;

                                    switch($knightAction->type) {
                                        case 6:
                                            $actionType = 'Quest';
                                            break;
                                        case 4:
                                            $actionType = 'Party';
                                            break;
                                        case 2:
                                            $actionType = 'Train';
                                            break;
                                        case 1:
                                            $actionType = "Slack Off";
                                            break;
                                    }
                                ?>
                                <h1>{{$actionType}}</h1>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
