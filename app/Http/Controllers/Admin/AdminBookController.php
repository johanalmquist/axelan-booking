<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Mail\Admin\deleteBookMail;
use App\Rules\Admin\Book\checkPlace;
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

    public function edit(Request $request) {
        $book = Book::where('nr', $request->bookNR)->first();
        $books = Book::all();
        $admin = User::find(Auth::id());
        $gravatar = AdminController::gravatar($admin);
        return view('admin.books.edit')->with('admin', $admin)->with('book', $book)->with('books', $books)->with('gravatar', $gravatar);
    }

    public function changePlace(Request $request) {
        $this->validate($request, [
           'place' => ['required', new checkPlace($request->place, $request->bookID)],
        ]);

        Book::find($request->bookID)->update(['place' => $request->place]);
        notify()->flash('Bokning har nu byt plats', 'success');
        return redirect(route('admin.books'));
    }

    public function verf(Request $request) {
        Book::find($request->bookID)->update([
           'verf' => true,
           'token' => null,
        ]);
        notify()->flash('Bokningen är nu bekräftad', 'success');
        return redirect(route('admin.books'));
    }


    public function delete(Request $request){
        $book = Book::find($request->book);
        Book::destroy($request->book);
        Mail::to($book->user->email)->send(new deleteBookMail($book));
        notify()->flash('Bokningen är nu borttagen', 'success');
        return redirect('/admin/books');
    }
}
