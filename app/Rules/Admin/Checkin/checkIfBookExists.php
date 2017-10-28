<?php

namespace App\Rules\Admin\Checkin;

use App\Book;
use Illuminate\Contracts\Validation\Rule;

class checkIfBookExists implements Rule
{
    public $message;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
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
        if(!Book::where('place', $value)->first()){
            $this->message = 'Det finns ingen bokning för denna plats';
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
