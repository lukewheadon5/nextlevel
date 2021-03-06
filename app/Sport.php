<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    public function teams()
    {
        return $this->hasMany('App\Team');

    }

    public function users()
    {
        return $this->belongsToMany('App\User');

    }

    public function positions()
    {
        return $this->hasMany('App\Position');

    }

    public function seasons()
    {
        return $this->hasMany('App\Season');
    }

    public function games()
    {
        return $this->hasMany('App\Game');
    }
}
