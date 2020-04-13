<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    public function team(){
        return $this->belongsTo('App\Team');
    }

    public function games(){
        return $this->hasMany('App\Game');
    }

    public function sport()
    {
        return $this->belongsTo('App\Sport');
    }

    public function userseasons()
    {
        return $this->hasMany('App\Userseason');
    }

    public function playlists()
    {
        return $this->hasMany('App\Playlist');
    }



}
