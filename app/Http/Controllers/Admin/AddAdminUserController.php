<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddAdminUserController extends Controller
{
    protected $info = array();
    public function __construct($info)
    {
        $this->info = $info;
        $this->run();
    }

    private function run(){
        if ($this->save()){
            return true;
        } else {
            return false;
        }
    }

    private function save(){
        $user = User::create([
            'name' => $this->info['name'],
            'nick' => $this->info['nick'],
            'born' => $this->info['born'],
            'email' => $this->info['email'],
            'password' => bcrypt($this->info['password']),
            'admin' => true,
            'activate' => true,
            'participant_type' => '1'
        ]);
        if($user){
            $user->admin = true;
            $user->save();
            return true;
        } else {
            return false;
        }
    }
}
