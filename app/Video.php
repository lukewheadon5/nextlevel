<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function playlist(){
        return $this->belongsTo('App\Playlist');
    }
}
