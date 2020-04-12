<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function coaches()
    {
        return $this->hasMany('App\Coach');
    }

    public function sport()
    {
        return $this->belongsTo('App\Sport');
    }

    public function admins()
    {
        return $this->hasMany('App\Admin');
    }

    public function playlists(){
        return $this->hasMany('App\Playlist');
    }

    public function thighlights()
    {
        return $this->hasMany('App\Thighlight');
    }

    public function seasons()
    {
        return $this->hasMany('App\Season');
    }

    public function games()
    {
        return $this->hasMany('App\Game');
    }

    public function usercareers()
    {
        return $this->hasMany('App\Usercareer');
    }
}
