<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function season()
    {
        return $this->belongsTo('App\Season');
    }


    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function sport()
    {
        return $this->belongsTo('App\Sport');
    }

    public function usergames()
    {
        return $this->hasMany('App\Usergame');
    }


}
