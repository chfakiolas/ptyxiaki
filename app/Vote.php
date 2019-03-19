<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['vote'];
    
	// Eloquent relationship one to many
    public function user(){
        // return $this->hasOne('App\User');
        return $this->belongsTo('App\User');
    }

    // Eloquent relationship one to many
    public function poll(){
    	return $this->belongsTo('App\Poll');
    }
}
