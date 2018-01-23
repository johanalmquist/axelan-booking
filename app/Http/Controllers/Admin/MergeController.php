<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Mail\MergeMail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

/**
 * Class MergeController
 * @package App\Http\Controllers\Admin
 * Class for Merge books from old to new system
 */
class MergeController extends Controller
{
    /**
     * Main function to merge books
     */
    public function index(){
        //json file with data from old system
        $file = file_get_contents(base_path().'/public/file.json');

        //convert $file from json to laravel collection
        $rows = new \Illuminate\Support\Collection(json_decode($file, true));
        /**$i = 1;
        foreach ($rows['books'] as $row){
            $user = $this->mergeUsers($row['user']);
            $book = $this->mergeBooks($row['book'], $user[0]->id);
            $i++;
        } **/
        return $rows['books'];
    }


    public function run($oldUser, $oldBook){
        $user = $this->mergeUsers($oldUser);
        $book = $this->mergeBooks($oldBook, $user[0]->id);
        Mail::to($book->user->email)->send(new MergeMail($book, $user[1]));

    }
    /**
     * Instering users to new system
     * @param $user
     * @return array
     */
    private function mergeUsers($user){
        // gen password for user
        $password = str_random(8);
        $newUser = new User;
        $newUser->name = $user['name'];
        $newUser->email = $user['email'];
        $newUser->password = bcrypt($password);
        $newUser->nick = $user['nick'];
        $newUser->born = $this->fixBorn($user['born']);
        $newUser->admin = false;
        $newUser->activate = true;
        $newUser->activation_token = null;
        $newUser->participant_type = 0;
        $newUser->save();
        return array($newUser, $password);
    }

    /**
     * fix born date format for new system
     * @param $born
     * @return string
     */
    private function fixBorn($born){
        //DD-MM-YYYY
        $newBorn = explode('/', $born);
        $y = $newBorn[0];
        $m = $newBorn[1];
        $d = $newBorn[2];
        return $d."-".$m."-".$y;
    }

    /**
     * Inserting books to new system
     * @param $book
     * @param $userID
     * @return Book
     */
    private function mergeBooks($book, $userID){
        $verf_end = Carbon::now()->addDays(2);
        $newBook = new Book;
        $newBook->nr = $book['nr'];
        $newBook->user_id = $userID;
        $newBook->place = $book['place'];
        $newBook->ip = $book['ip'];
        $newBook->verf = true;
        $newBook->token = null;
        $newBook->end_verf_date = $verf_end;
        $newBook->checked_in = false;
        $newBook->paid = false;
        $newBook->save();

        return $newBook;
    }
}
