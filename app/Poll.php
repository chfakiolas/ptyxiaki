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

    public static function expPolls($polls)
    {
        foreach ($polls as $poll) {

            $expiration = $poll->date . ' ' . $poll->time;
            $expired = strtotime($expiration) < time();

            if($poll->status === 'In progress' && $expired){
                $poll->status = 'Completed';
                $poll->save();
            }
        }
    }
}
