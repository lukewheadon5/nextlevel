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

    public function game()
    {
        return $this->belongsTo('App\Game');
    }

    public function season()
    {
        return $this->belongsTo('App\Season');
    }
}
