<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    protected $fillable = ['artist_id', 'name', 'cover'];

    public function artist() {
        return $this->belongsTo('App\Artist');
    }

    public function singles() {
        return $this->hasOne('App\Singles');
    }
}
