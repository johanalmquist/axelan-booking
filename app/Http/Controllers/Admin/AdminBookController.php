<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminBookController extends Controller
{
    public function index(){
        $books = Book::all();
        $admin = User::find(Auth::id());
        $gravatar = AdminController::gravatar($admin);
        return view('admin.books.index')->with('admin', $admin)->with('books', $books)->with('gravatar', $gravatar);
    }
}
