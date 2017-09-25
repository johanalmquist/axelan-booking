<?php

namespace App\Rules\Admin\Book;

use App\Book;
use Illuminate\Contracts\Validation\Rule;

class checkPlace implements Rule
{
    public $place, $bookID, $message;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($place, $bookID)
    {
        $this->place = $place;
        $this->bookID = $bookID;
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
        if ($check = Book::where('place', $value)->first()){
            if ($check->id == $this->bookID){
                return true;
            } else {
                $this->message = 'Denna plats används redan av en annan bokning. Vill du ändå byta använd "Byt plats med annan bokning".';
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
