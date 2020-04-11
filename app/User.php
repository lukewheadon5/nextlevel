<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public function teams()
    {
        return $this->belongsToMany('App\Team');

    }

    public function coaches()
    {
        return $this->hasMany('App\Coach');

    }

    public function admins()
    {
        return $this->hasMany('App\Admin');

    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function sports()
    {
        return $this->belongsToMany('App\Sport');
    }

    public function positions()
    {
        return $this->belongsToMany('App\Position');
    }

    public function Highlights()
    {
        return $this->hasMany('App\Highlight');
    }

    public function Annotations()
    {
        return $this->hasMany('App\Annotation');
    }

    public function usergames()
    {
        return $this->hasMany('App\Usergame');
    }

    public function userseasons()
    {
        return $this->hasMany('App\Userseason');
    }

    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   
}
