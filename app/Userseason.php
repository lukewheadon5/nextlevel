<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userseason extends Model
{
    public function season()
    {
        return $this->belongsTo('App\Season');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function usercareer()
    {
        return $this->belongsTo('App\Usercareer');
    }
}
