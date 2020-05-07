<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function quiz()
    {
        return $this->belongsTo('App\Quiz');
    }

    public function useranswers()
    {
        return $this->hasMany('App\Useranswer');
    }
}
