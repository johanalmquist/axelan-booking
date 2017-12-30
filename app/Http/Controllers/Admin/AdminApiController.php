<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminApiController extends Controller
{
    public function totalBooks() {
        return Book::all()->count();
    }

    public function totalBooksVerf() {
        return Book::where('verf', 1)->count();
    }

    public function totalBooksNoVerf() {
        return Book::where('verf', 0)->count();
    }

    public function totalUsers() {
        return User::all()->count();
    }

    public function  getBooks() {
        return response()->json(Book::all()->take(10));
    }

    public function getUsers(){
        $users = User::all();
        return view('admin.api.users.show')->with('users', $users);
    }
}
