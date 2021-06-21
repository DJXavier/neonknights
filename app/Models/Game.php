<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function knights() {
        return $this->hasMany(Knight::class);
    }
}