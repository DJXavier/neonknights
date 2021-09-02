<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    
    protected $connection = 'mongodb';

    /* public function getAttribute($key) {
        if (array_key_exists($key, $this->attributes)) {
            return parent::getAttribute($key);
        }
    } */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'type', 'noPlayers', 'currentRound', 'resetDay', 'invited', 'gameMaster'];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function knights() {
        return $this->hasMany(Knight::class);
    }

    public function noblebots() {
        return $this->hasMany(Noblebot::class);
    }

    public function weeks() {
        return $this->hasMany(Week::class);
    }
}
