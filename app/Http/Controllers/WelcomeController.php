<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index() {
        $books = Book::all();
        $user = User::find(Auth::id());
        return view('home')->with('books', $books)->with('user', $user);
    }

    public function test(){

    }
}
