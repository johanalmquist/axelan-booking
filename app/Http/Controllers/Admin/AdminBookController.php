<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Mail\Admin\deleteBookMail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminBookController extends Controller
{
    public function index(){
        $books = Book::all();
        $admin = User::find(Auth::id());
        $gravatar = AdminController::gravatar($admin);
        return view('admin.books.index')->with('admin', $admin)->with('books', $books)->with('gravatar', $gravatar);
    }

    public function delete(Request $request){
        $book = Book::find($request->book);
        Book::destroy($request->book);
        Mail::to($book->user->email)->send(new deleteBookMail($book));
        notify()->flash('Bokningen är nu borttagen', 'success');
        return redirect('/admin/books');
    }
}
