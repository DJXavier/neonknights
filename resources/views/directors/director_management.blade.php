@extends('layouts.app')
<style>
    body {
        background-color: #080325e6;
    }
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
    a.btn {
        margin-bottom: 10px;
    }
    .scroll-table {
        overflow-y :scroll;
        height: 470px;
    }
    .wd-75 {
        width: 75px;
    }
    .wd-100 {
        width: 100px;
    }
    .wd-125 {
        width: 125px;
    }
</style>
<title>Display Directing Games</title>

<?php
    $games = \App\Models\Game::All();
?>

@section('content')

    <div class="container">
        <div class="card mb-4">
            <div class="card-header">{{ __('Directing Games') }}</div>
            <div class="card-body">
                <div class="d-flex col-sm-8 align-items-center justify-content-between">
                    <label>Move all games onto their next week: </label>
                    <a href="/game/advance" class="btn btn-sm btn-warning">
                        Advance Games
                    </a>
                </div>
                <div class="scroll-table">
                    <table>
                    <tr>
                        <th>Group Name</th>
                        <th>Current Round</th>
                        <th>No. of Players</th>
                        <th>Reset Date</th>
                        <th class="wd-100">Group Forum</th>
                        <th class="wd-100">View Group</th>
                    </tr>

                    @foreach ($games as $game)
                        <?php
                            $forumId = $game->forumId;
                            $forum = TeamTeaTime\Forum\Models\Category::Find($forumId);
                            $linkPath = null;
                            if ($forum != null) {
                                $title = $forum->title;
                                $title = strtolower($title);
                                $title = preg_replace('/\s+/', '-', $title);
                                $linkPath = ('/forum/c/'.$forumId.'-'.$title);
                            }
                        ?>
                        <tr>
                            <td>{{$game->name}}</th>
                            <td>{{$game->currentRound}}</th>
                            <td>{{$game->noPlayers}}</th>
                            <td>{{$game->resetDate}}</th>
                            <td>
                                @if($linkPath != null)
                                    <a href="{{$linkPath}}" class="btn btn-sm btn-info">Group Forum</a>
                                @endif
                            </td>
                            <td>
                                <a href="/director-management/{{$game->id}}" class="btn btn-sm btn-secondary">
                                    View Group
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection