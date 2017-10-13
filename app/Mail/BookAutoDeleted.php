<?php

namespace App\Mail;

use App\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookAutoDeleted extends Mailable
{
    use Queueable, SerializesModels;
    public $book;
    /**
     * Create a new message instance.
     *
     * @return void
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
        return $this->subject('Din bokning är borttagen')->markdown('emails.admin.book.autoDeleted');
    }
}
