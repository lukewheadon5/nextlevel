<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function userscores()
    {
        return $this->hasMany('App\Userscore');
    }
}
