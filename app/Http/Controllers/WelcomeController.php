<?php

namespace App\Http\Controllers;

use App\Book;
use App\Mail\testMassMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{
    public function index() {
        $user = User::find(Auth::id());
        return view('home')->with('user', $user);
    }

    public function test(){

    }
}
