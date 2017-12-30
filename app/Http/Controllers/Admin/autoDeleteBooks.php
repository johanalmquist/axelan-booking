<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Mail\BookAutoDeleted;
use App\Mail\VerfReminader;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

/**
 * This class will delete all books thar not as been verf before the last day for verf and send a email the user about it
 * Class autoDeleteBooks
 * @package App\Http\Controllers\Admin
 */
class autoDeleteBooks extends Controller
{
    public  function __construct()
    {
        $this->findBooks();
    }

    /**
     *
     */
    private function findBooks () {
        $books = Book::where('end_verf_date', '<', date("Y-m-d"))->where('verf', false)->get();
        foreach ($books as $book) {
            $this->deleteBook($book);
            $this->sendEmail($book);
        }
    }

    private function deleteBook(Book $book){
        Book::destroy($book->id);
    }

    private function sendEmail(Book $book) {
        Mail::to($book->user->email)->send(new BookAutoDeleted($book));
    }

    private function sendReminaderEmail(Book $book) {
        Mail::to($book->user->email)->send( new VerfReminader($book));
    }

}
