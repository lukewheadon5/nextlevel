<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usergame extends Model
{
    public function game()
    {
        return $this->belongsTo('App\Game');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function userseason()
    {
        return $this->belongsTo('App\Userseason');
    }
}
