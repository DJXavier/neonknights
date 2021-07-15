<?php

namespace App\Http\Controllers;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Game;
use App\Models\User;

class GameInvite extends Mailable
{
    use Queueable, SerializesModels;

    protected $game;
    protected $gameMaster;
    protected $recipient;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Game $game, User $gameMaster, User $recipient = null)
    {
        $this->game = $game;
        $this->gameMaster = $gameMaster;
        $this->recipient = $recipient;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.newgame', [
            'masterHandle' => $this->gameMaster->name,
            'gameName' => $this->game->name,
            'gameLink' => url('/knight/create/' . $this->game->id),
            'recipientHandle' => $this->recipient?->name,

        ]);
    }
}