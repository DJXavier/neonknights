<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class GameProperty extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'game_property';

    protected $fillable = [
        'name','type','noPlayers','dayOfWeek','user_array'
    ];
}