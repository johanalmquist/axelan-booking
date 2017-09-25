<?php

namespace App\Rules\User;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class checkNick implements Rule
{
    public $user, $nick, $message;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($nick, $user)
    {
        $this->user = $user;
        $this->nick = $nick;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        /** check if the nick exsits in the databse */
        if ($check = User::where('nick', $value)->first()){
            /** check if the user has the nick **/
            if($check->id == $this->user){
                return true;
                /** If user not has the nick return false */
            } else {
                $this->message = "Nicket används redan av en annan använadre.";
                return false;
            }
        }
        /** If the nick not exsit in the database return true */
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
