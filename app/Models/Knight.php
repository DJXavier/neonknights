<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Knight extends Model
{
    use HasFactory;

    public function getAttribute($key) {
        if (array_key_exists($key, $this->attributes)) {
            return parent::getAttribute($key);
        }
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function game() {
        return $this->belongsTo(Game::class);
    }
}
