<?php

namespace App\Http\Controllers\User;


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
        $gravatar = $this->gravatar($user);
        return view('user.profile')->with('user', $user)->with('gravatar', $gravatar);
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

    /**
     * Logout the user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }


    /**
     * Get profile img to user from gravatar.com
     * @param User $user
     * @return string
     */
    private function gravatar(User $user) {
        $email = $user->email;
        $default = "https://www.somewhere.com/homestar.jpg";
        $size = 150;
        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    }
}
