<?php

use App\User;
use App\Book;
use Illuminate\Support\Facades\Auth;

/**
 * @param $p the place the check
 */
function place($p){
    if ($book = Book::where('place', $p)->first()) {
        echo '<td bgcolor="#808080" class="placeBooked" data-place="'.$p.'" data-nick="'.$book->user->nick.'" data-bookedDate="'.$book->created_at->diffForHumans().'">'.$p.'</td>';
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

