<?php

namespace App\Rules\User;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class checkMail implements Rule
{
    public $mail, $user, $message;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($mail, $user)
    {
        $this->mail = $mail;
        $this->user = $user;
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
        if ($check = User::where('email', $value)->first()){
            if($check->id == $this->user){
                return true;
            } else {
                $this->message = "Denna E-post adress används redan av en annan användare";
                return false;
            }
        }
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
