<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function Game()
    {
        return $this->belongsTo('App\Game');
    }
}
