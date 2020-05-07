<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userscore extends Model
{
    public function quiz()
    {
        return $this->belongsTo('App\Quiz');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
