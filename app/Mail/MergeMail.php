<?php

namespace App\Mail;

use App\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MergeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $book, $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Book $book, $password)
    {
        $this->book = $book;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Vi har bytt bokningssystem')->markdown('emails.admin.merge.info');
    }
}
