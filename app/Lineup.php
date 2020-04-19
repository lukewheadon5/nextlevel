<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lineup extends Model
{
    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function positions()
    {
        return $this->hasMany('App\Position');
    }
}
