<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use  Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nick', 'born', 'mobile', 'activate', 'activation_token', 'participant_type',
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
     * Get the user for the book
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function book(){
        return $this->hasOne('App\Book');
    }

    public function isAdmin($userID){
        $user = $this->find($userID);
        if($user->admin){
            return true;
        }
        return false;
    }


}
