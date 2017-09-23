<?php

namespace App\Mail\Admin;

use App\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class deleteBookMail extends Mailable
{
    use Queueable, SerializesModels;
    public $book;

    /**
     * Create a new message instance.
     *
     * @param Book $book
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.admin.books.deletedBook');
    }
}
