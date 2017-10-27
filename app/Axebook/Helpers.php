<?php

use App\User;
use App\Book;
use Illuminate\Support\Facades\Auth;

/**
 * @param $p the place the check
 */
function place($p){
   $book = Book::where('place', $p)->first();
    if($book){
        // user is a current student at Axevalla FHSK
        if($book->user->participant_type == 1){
            $color = "#6cbf6c";
        }
        // user is old student at Axevalla FHSK
        elseif ($book->user->participant_type == 2){
            $color = "#9dd49d";
        }
        // user is a guest
        else {
            $color = "#808080";
        }
        echo '<td bgcolor="'. $color . '" class="placeBooked" data-place="' . $p . '" data-nick="' . $book->user->nick . '" data-bookedDate="' . $book->created_at->diffForHumans() . '">' . $p . '</td>';
    }
    else {
        if(!Auth::check()){
            echo '<td class="mustLogIn">'.$p.'</td>';
        } else {
            echo '<td class="place">' . $p . '</td>';
        }
    }

}

/**
 * Make a random string
 * @return string
 */
function makeRandomString(){
	$string = md5(uniqid(rand(), true));
	return $string;
}

function bookingNumber() {

}

