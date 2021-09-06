<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    public static $slackType = 1;
    public static $trainType = 2;
    public static $flirtType = 3;
    public static $tavernType = 4;
    public static $joustType = 5;
    public static $questType = 6;
    public static $poemType = 7;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'target_bot' => null,
        'target_knight' => null,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type', 'quest_code', 'reject'];

    public function knight() {
        return $this->embedsOne(Knight::class, 'knight');
    }

    public function noblebot() {
        return $this->embedsOne(Noblebot::class, 'target_bot');
    }

    public function targetknight() {
        return $this->embedsOne(Knight::class, 'target_knight');
    } 
}