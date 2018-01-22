<?php
/**
 * Created by PhpStorm.
 * User: Johan
 * Date: 2018-01-22
 * Time: 17:38
 */

namespace App\Transformers;


use App\Book;

class BookTransformer extends \League\Fractal\TransformerAbstract
{

    public function transform(Book $book){
        return [
            'place' => $book->place,
            'nick' => $book->user->nick,
            'name' => $book->user->name,
            'booked' => $book->created_at->toDateTimeString(),
            'booked_human' => $book->created_at->diffForHumans(),
        ];
    }
}