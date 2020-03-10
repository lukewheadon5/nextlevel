<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thighlight extends Model
{
    public function video(){
        return $this->belongsTo('App\Video');
      }
      
      public function team()
      {
          return $this->belongsTo('App\Team');
  
      }
      
}
