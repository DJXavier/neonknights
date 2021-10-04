<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Character extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'shoe';

    protected $fillable = [
        'name', 'pronouns', 'strength', 'dexterity', 'constitution', 'stamina', 'max_stamina', 'level', 'dex_trained', 'training_points'
    ];
}