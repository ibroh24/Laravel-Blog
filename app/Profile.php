<?php

namespace App;
use User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function users(){
        return $this->belongTo('App\User');
    }

    protected $fillable = 
    [
        'user_id', 'youtube', 'avatar', 'facebook', 'about'
    ];
}
