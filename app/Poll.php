<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
	// Eloquent relationship one to many
    public function user(){
    	return $this->hasOne('App\User');
    }

	// Eloquent relationship one to many
    public function pollOption(){
    	return $this->hasMany('App\PollOption');
    }

    // Eloquent relationship one to many
    public function vote(){
    	return $this->hasMany('App\Vote');
    }
}
