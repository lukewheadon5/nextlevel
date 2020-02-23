<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public function team(){
        return $this->belongsTo('App\Team');
    }
  
    public function videos(){
        return $this->hasMany('App\Video');
    }
}
