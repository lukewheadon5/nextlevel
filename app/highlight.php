<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class highlight extends Model
{
    public function video(){
        return $this->belongsTo('App\Video');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
