<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\GameProperty;
use Illuminate\Support\Facades\Route;


class GameInvite extends Mailable
{
    use Queueable, SerializesModels;

    protected $gameProperty;
   


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(GameProperty $gameProperty)
    {
        $this->gameProperty = $gameProperty;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.invitationEmail', [
           
            'gameName' => $this->gameProperty->name,
            'gameLink' => url('/'),
            
        ]);
    }
}