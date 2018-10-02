<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollOption extends Model
{
    // Eloquent relationship one to many
    public function poll(){
    	return $this->hasOne('App\Poll');
    }
}
