<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addSong extends Model
{

    public function user() {
        return $this->belongsTo('App\Users');
    }

    // public function song() {
    //     return $this->belongsTo('App\Singles');
    // }
}
