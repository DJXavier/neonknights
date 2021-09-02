<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

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
        $sqlentry = \App\Models\SQLUser::all()->filter(function ($value, $key) {
            return $value->mongo_id == parent::getKey();
        })->first();

        $key = null;

        //IF API request
        //IF Forum API reuest
        $path = request()->path();
        if (str_contains($path, 'api')) {
            if (str_contains($path, 'forum')) {
                $key = $sqlentry->getKey();
            } else {
                $key = parent::getKey();
            }
        } else if (!str_contains(request()->path(), 'forum') && !request()->session()->exists('token')) {
            $key = parent::getKey();
        } else {
            if (request()->session()->exists('token')) {
                request()->session()->pull('token');
            }
            $key = $sqlentry->getKey();
        }

        return $key;
    }
}
