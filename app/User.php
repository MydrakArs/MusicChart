<?php

namespace App;

use App\Traits\Friendable;
use Laravel\Scout\Searchable;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Friendable;
    use Searchable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'singer_name',
        'profile_image', 
        'email', 
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile() {
        return $this->hasOne('App\Profile');
    }

    public function artist() {
        return $this->hasOne('App\Artist');
    }

    public function albums() {
        return $this->hasManyThrough(
            'App\Albums', 
            'App\Artist'
        );
    }

    public function songs() {
        return $this->hasMany('App\addSongs');
    }
}
