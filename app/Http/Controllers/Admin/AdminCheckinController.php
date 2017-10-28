<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Rules\Admin\Checkin\checkIfBookExists;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminCheckinController extends Controller
{

    /**
     * Show form to find book to check in
     * @return $this
     */
    public function step1() {
        $admin = User::find(Auth::id());
        $gravatar = AdminController::gravatar($admin);
        return view('admin.books.checkin.step1')->with('gravatar', $gravatar)->with('admin', $admin);
    }
    public function step2(Request $request) {
        $this->validate($request, [
           'place' => ['required', new checkIfBookExists()],
        ]);
        return redirect(route('admin.books.checkin.verify', ['place' => $request->place]));
    }

    public function verify(Request $request){
        $admin = User::find(Auth::id());
        $gravatar = AdminController::gravatar($admin);
        $book = Book::where('place', $request->place)->first();
        return view('admin.books.checkin.verify')->with('gravatar', $gravatar)->with('admin', $admin)->with('book', $book);
    }
    public function checkin(Request $request) {
        $book = Book::find($request->bookID);
        $book->checked_in = true;
        $book->paid = $request->paid;
        $book->save();
        notify()->flash('Bokningen är nu in checkad', 'success');
        return redirect(route('admin.books.checkin'));
    }
}
