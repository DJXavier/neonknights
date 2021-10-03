<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $connection = 'mongodb';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function games() {
        return $this->belongsToMany(Game::class);
    }

    public function knights() {
        return $this->hasMany(Knight::class);
    }

    public function getKey() {
        $sqlentry = SQLUser::all()->filter(function ($value, $key) {
            return $value->mongo_id == parent::getKey();
        })->first();

        $key = null;

        if (!str_contains(request()->path(), 'forum')) {
            $key = parent::getKey();
        } else {
            $key = $sqlentry->getKey();
        }

        return $key;
    }
}
