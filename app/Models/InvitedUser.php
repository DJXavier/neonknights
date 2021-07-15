<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class InvitedUser extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'invited_user';

    protected $fillable = [
        'gameId','email'
    ];
}