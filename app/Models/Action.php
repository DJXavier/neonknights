<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

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
