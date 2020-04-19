<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public function lineup()
    {
        return $this->belongsTo('App\Lineup');
    }

}
