<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        $books = Book::all();
        $users = User::all();
        $admin = User::find(Auth::id());
        $gravatar = $this->gravatar($admin);
        return view('admin.index')->with('admin', $admin)->with('gravatar', $gravatar)->with('books', $books)->with('users', $users);

    }


    /**
     * Get profile img to user from gravatar.com
     * @param User $user
     * @return string
     */
    public static function gravatar(User $user) {
        $email = $user->email;
        $default = "https://www.somewhere.com/homestar.jpg";
        $size = 150;
        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    }
}
