<?php

namespace App;

use Adldap\Laravel\Traits\HasLdapUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Adldap\Laravel\Facades\Adldap;

// use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable, HasLdapUser;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Eloquent relationship one to many
    public function poll(){
        return $this->hasMany('App\Poll');
    }

    // Eloquent relationship one to many
    public function vote(){
        return $this->hasOne('App\Vote');
    }

    public function isAdmin(){
        $mathems = Adldap::search()->where([ //Ψάχνω την οντότητα με τους mathematicians ston LDAP server 
            ['ou', '=', 'mathematicians'],
            ['uniquemember', '=', $this->dn], // Κοιτάω αν υπάρχει το dn του user στην οντότητα
         ]);
         
        if($mathems->first()) { //κοιτάει αν το μοντέλο υπάρχει
            return true;
        } else {
            false;
        }
    }

    // Overrides the method to ignore the remember token
    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute){
            parent::setAttribute($key, $value);
        }
    }
}
