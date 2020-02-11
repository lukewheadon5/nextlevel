<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public function sport()
    {
        return $this->belongsTo('App\Sport');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
