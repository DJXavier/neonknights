<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Game;
use Illuminate\Support\Facades\Route;


class GameInvite extends Mailable
{
    use Queueable, SerializesModels;

    protected $game;
   


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Game $game)
    {
        $this->game = $game;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.invitationEmail', [
           
            'gameName' => $this->game->name,
            'gameLink' => url('/'),
            
        ]);
    }
}