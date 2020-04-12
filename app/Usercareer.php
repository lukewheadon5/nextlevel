<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usercareer extends Model
{
    public function userseasons()
    {
        return $this->hasMany('App\Userseason');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
