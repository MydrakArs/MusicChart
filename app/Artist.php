<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = ['name', 'user_id', 'profile_image'];

    public function albums() {
        return $this->hasMany('App\Albums');
    }

    public function singles() {
        return $this->hasOne('App\Singles');
    }
}
