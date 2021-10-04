<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $atributes = [
        'resetDate' => 'Thursday',
        'start' => false,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'noPlayers',
        'currentRound',
        'resetDate',
        'start',
        'invited',
        'gameMaster'
    ];

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
