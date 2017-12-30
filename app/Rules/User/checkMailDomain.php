<?php

namespace App\Rules\User;

use Illuminate\Contracts\Validation\Rule;

class checkMailDomain implements Rule
{
    public $message;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $domains = array('gmail.com', 'outlook.com', 'outlock.se', 'live.com', 'live.se', 'icloud.com', 'yhaoo', 'hotmail.com', 'hotmail.se', 'me.com', 'johanalmquist.se');
        $mailDomain = substr($value, strpos($value, '@')+1);
        if(!in_array($mailDomain, $domains)){
            $this->message = 'Du kan bara använda en e-post ifrån dessa domäner: gmail.com, outlook.com, outlock.se, live.com, live.se, icloud.com, yhaoo.com, hotmail.com, hotmail.se, me.com';
            return false;
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
