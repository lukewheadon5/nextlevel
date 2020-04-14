<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'task_date'];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
