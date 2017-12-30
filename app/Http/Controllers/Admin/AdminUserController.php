<?php

namespace App\Http\Controllers\Admin;

use App\Mail\Admin\adminAddedUserMail;
use App\Mail\Admin\deledetUserMail;
use App\Mail\Admin\updatedUserProfileMail;
use App\Role;
use App\Rules\checkBorn;
use App\Rules\User\checkMail;
use App\Rules\User\checkNick;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminUserController extends Controller
{
    public function index() {
        $users = User::all();
        $admin = User::find(Auth::id());
        $gravatar = AdminController::gravatar($admin);
        return view('admin.users.index')->with('admin', $admin)->with('users', $users)->with('gravatar', $gravatar);
    }

    public function delete(Request $request){
        $user = User::find($request->user);
        User::destroy($request->user);
        Mail::to($user->email)->send(new deledetUserMail($user));
        notify()->flash('Användren är nu bort tagen', 'success');
        return redirect('/admin/users');
    }

    public function edit(Request $request){
        $member = User::find($request->userID);
        $admin = User::find(Auth::id());
        $gravatar = AdminController::gravatar($admin);
        return view('admin.users.edit')->with('admin', $admin)->with('member', $member)->with('gravatar', $gravatar);

    }

    public function update(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'email' => ['required','email', 'string', new checkMail($request->email, $request->userID)],
            'nick' => ['required', 'string', new checkNick($request->nick, $request->userID)],
            'born' => ['required', 'string', new checkBorn($request->born)],
            'admin' => 'required',
        ]);
        $user = User::find($request->userID);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nick = $request->nick;
        $user->born = $request->born;
        $user->admin = $request->admin;
        $user->participant_type = $request->participant_type;

        if($user->save()){
            Mail::to($user->email)->send(new updatedUserProfileMail($user));
            notify()->flash('Användren är uppdaterad', 'success');
            return back();
        } else {
            notify()->flash('Kunde inte uppdatera använden. Prova igen om en stund.' , 'error');
            return back();
        }
    }

    public function addNewUser(){
        $admin = User::find(Auth::id());
        $gravatar = AdminController::gravatar($admin);
        return view('admin.users.new')->with('admin', $admin)->with('gravatar', $gravatar);
    }

    public function saveNewUser(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'nick' => 'required|string|max:255|unique:users',
            'born' => ['required', new checkBorn()],
            'admin' => 'required',
            'participant_type' => 'required',
        ]);
        // gen password for user
        $password = str_random(8);
        //save to database and send email to user
       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nick' => $request->nick,
            'born' => $request->born,
            'password' => bcrypt($password),
            'admin' => $request->admin,
            'participant_type' => $request->participant_type,
            'activate' => true,
        ]);
       Mail::to($user->email)->send(new adminAddedUserMail($user, $password));
       notify()->flash('Användare'. $user->nick . ' är nu tillagd', 'success');
       return redirect(route('admin.users'));
    }

}
