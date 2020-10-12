<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singles extends Model
{

    public function artist() {
        return $this->belongsTo('App\Artist');
    }

    public function album() {
        return $this->belongsTo('App\Albums');
    }

    // public function song() {
    //     return $this->hasMany('App\addSong');
    // }
}
