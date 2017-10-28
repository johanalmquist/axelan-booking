<?php

namespace App\Http\Controllers\User;


use App\Rules\checkBorn;
use App\Rules\User\checkNick;
use App\Rules\User\currentPassword;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    /**
     * Show users profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $user = User::find(Auth::id());
        return view('user.profile')->with('user', $user);
    }

    public function update(Request $request) {
        $this->validate($request, [
           'name' => 'required|string',
           'nick' => ['required', 'string', new checkNick($request->nick, $request->userID)],
           'born' => ['required', 'string', new checkBorn($request->born)],
           'Epassword' => ['required', 'string', 'min:8', new currentPassword()],
        ]);

        User::find($request->userID)->update([
            'name' => $request->name,
            'nick' => $request->nick,
            'born' => $request->born,
            'participant_type' => $request->participant_type,
        ]);
        notify()->flash('Din profil är nu uppdaterad', 'success');
        return redirect(route('profile'));
    }

    public function updatePassword(Request $request) {
        $this->validate($request, [
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'current' => [
                'required', 'string', 'min:8', new currentPassword(),
            ],
        ]);

        $user = User::find(Auth::id());
        $user->password = Hash::make($request->password);
        $user->save();

        notify()->flash('Ditt löseord har blvit uppdaterat.', 'success');
        return redirect(route('profile'));
    }

    public function delete(){
        User::destroy(Auth::id());
        notify()->flash('Ditt konto är nu bort taget', 'success');
        return redirect(route('firstSide'));
    }

    /**
     * Logout the user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

}
