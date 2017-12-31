<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Mail\Book\BookVerfEmail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use function PHPSTORM_META\type;

class BookController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'place' => 'required',
            'roles' => 'required',
        ]);

        //Insert book to database
        $verf_end = Carbon::now()->addDays(2);
        $book = Book::create([
            'nr' => $this->makeBookingNumber(),
            'user_id' => Auth::id(),
            'place' => $request->input('place'),
            'ip' => $request->ip(),
            'verf' => false,
            'end_verf_date' => $verf_end,
            'token' => str_random(50),
        ]);
        $this->SendVerfMail($book);
        notify()->flash('Du har nu bokat din plats. Glömt inte att bekärfta din plats senast ' . $verf_end->toDateString() . '', 'success');
        return redirect('/');
    }

    /**
     * Verf users book
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function verf(Request $request)
    {
        $book = Book::where('nr', $request->nr)->where('token', $request->token)->first();
        if (!$book) {
            notify()->flash('Vi kunde inte hitta din bokning eller så har du redan verf din bokning.', 'info');
            return redirect('/profile');
        } else {
            $book->update([
                'verf' => true,
                'token' => null,
            ]);
            notify()->flash('Din bokning är nu bekräftad.', 'success');
            return redirect('/profile');
        }
    }

    public function resendVerfMail()
    {
        $book = Book::where('user_id', Auth::id())->where('verf', 0)->first();
        if (!$book) {
            notify()->flash('Vi kunde inte din bokning eller så har du redan verf din bokning.', 'info');
            return redirect('/profile');
        } else {
            $book->update([
                'verf' => false,
                'token' => str_random(50),
            ]);
            $this->SendVerfMail($book);
            notify()->flash('Vi har skickat ett ntt verf mail till din epost', 'success');
            return redirect('/profile');
        }
    }

    public function delete() {
        $book = Book::where('user_id', Auth::id())->first();
        if(!$book) {
            notify()->flash('Vi kunde inte ta bort din bokning då det inte fanns någon.', 'error');
            return redirect('/profile');
        } else {
            $book->delete();
            notify()->flash('Din bokning är nu bort tagen.', 'success');
            return redirect('/profile');
        }
    }

    /**
     * Send book verf to user
     * @param Book $book
     */
    private function SendVerfMail(Book $book)
    {
        Mail::to($book->user->email)->send(new BookVerfEmail($book));
    }


    /**
     * Make booking number
     * @return int
     */
    public static function makeBookingNumber()
    {
        $done = false;
        while (!$done) {
            $nr = rand(1000, 4000);
            $book = Book::where('nr', $nr)->first();
            if (!$book) {
                $done = true;
                return $nr;
            }
        }


    }
}
