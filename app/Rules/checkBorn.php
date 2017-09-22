<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class checkBorn implements Rule
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
        $check = explode('-', $value);
        // check day
        if ($check[0] < 1 || $check[0] > 31 || $check[1] < 01 || $check[1] > 12 || $check[2] < 1965 || $check[2] > date('Y')){
            $this->message = 'Fel aktikt datum.';
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
