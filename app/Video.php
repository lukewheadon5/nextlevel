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

    public function thighlights()
    {
        return $this->hasMany('App\Thighlight');
    }

    public function highlights()
    {
        return $this->hasMany('App\Highlight');
    }

    public function annotations(){
        return $this->hasMany('App\Annotation');
    }
}
