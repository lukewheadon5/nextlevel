<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Useranswer extends Model
{
    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function user()
    {
        return $this->belongTo('App\User');
    }
}
