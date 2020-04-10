<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annotation extends Model
{
    public function team(){
        return $this->belongsTo('App\Team');
    }

    public function video(){
        return $this->belongsTo('App\Video');
    }

    public function User(){
        return $this->belongsTo('App\User');
    }
}
