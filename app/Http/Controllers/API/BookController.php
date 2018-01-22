<?php

namespace App\Http\Controllers\API;

use App\Book;
use App\Transformers\BookTransformer;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(){
        $books = Book::orderBy('place', 'asc')->get();
        return fractal()
            ->collection($books)
            ->transformWith(new BookTransformer)
            ->toArray();
    }
}
