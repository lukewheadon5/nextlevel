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

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function rosters()
    {
        return $this->hasMany('App\Roster');
    }

    public function lineup()
    {
        return $this->hasOne('App\Lineup');
    }

    public function plays()
    {
        return $this->hasMany('App\Play');
    }

    public function quizs()
    {
        return $this->hasMany('App\Quiz');
    }
}
