<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InviteController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $game = \App\Models\Game::FindOrFail($request['thisId']);

        $emailRules = [];
        $newPlayers = $request['players'] - 1;

        for ($i = 1; $i <= $newPlayers; $i++) {
            $diffRules = '';

            for($j = 1; $j <= $newPlayers; $j++) {
                if ($j != $i)
                    if ($j == $newPlayers)
                        $diffRules .= 'different:player'.$j;
                    else
                        $diffRules .= 'different:player'.$j.'|';
            }

            $emailRules['player'.$i] = 'required|email|' . $diffRules;
        }

        $emails = $request->validate(
            $emailRules
        );

        foreach($emails as $key => $email) {
            $users = \App\Models\User::All();
            $player = $users->where('email', $email)->first();
            if ($player != null) {
                $game->users()->save($player);
            } else {
                $invited = $game->invited;
                array_push($invited, $email);
                $game->invited = $invited;
                $game->save();
            }

            Mail::to($email)->send(new \App\Mail\GameInvite($game));
        }
        
        return redirect('/invite-successful');
    }

    public function updateSingle(Request $request)
    {
        $maxGroupSize = 12;
        $game = \App\Models\Game::FindOrFail($request['thisId']);

        if ($request['email'] == '' || $request['email'] == null) {
            $updateMessage = "Invalid input. Must enter an email.";
        }
        else if ($game->noPlayers == $maxGroupSize) {
            $updateMessage = "Invite failed. Group is at max capacity of " . $maxGroupSize . ".";
        }
        else {
            $users = \App\Models\User::All();
            $player = $users->where('email', $request['email'])->first();
            $game->increment('noPlayers');
            if ($player != null) {
                $game->users()->save($player);
            } else {
                $invited = $game->invited;
                array_push($invited, $email);
                $game->invited = $invited;
                $game->save();
            }
            $updateMessage = "Group invite sent to " . $request['email'] . ".";

            Mail::to($request['email'])->send(new \App\Mail\GameInvite($game));
        }

        return redirect('group-management/'.$game->id.'/invite-single-user')->with('updateMessage', $updateMessage);
    }
}
