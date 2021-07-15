<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    /* public function getAttribute($key) {
        if (array_key_exists($key, $this->attributes)) {
            return parent::getAttribute($key);
        }
    } */

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function knights() {
        return $this->hasMany(Knight::class);
    }
}
