<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    //Need one relationship for knight taking action, and one for knight to joust against.
    public function knight() {
        return $this->embedsOne(Knight::class);
    }

    public function noblebot() {
        return $this->embedsOne(Noblebot::class);
    }
}
