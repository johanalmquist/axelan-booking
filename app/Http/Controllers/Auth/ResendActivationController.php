<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResendActivationController extends Controller
{
    /**
     * Show user the form to resend activation email
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResendForm() {

        return view('auth.activate.resend');
    }

    /**
     * Email user the new activation code
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function reSend(Request $request){
         $this->validate($request, [
            'email' => 'required|email|exists:users,email'
         ], [
             'email.exists' => 'Kunde inte hitta kontot.'
         ]);

         $user = User::where('email', $request->email)->where('activate', false)->first();
         if(!$user){
             notify()->flash('Du har redan aktiverat ditt konto. Har du glömt ditt lösenord gå till glömt lösenord.', 'info');
             return redirect('/login');
         }
         ActivationController::SendActivationEmail($user);
        notify()->flash('Ett nytt aktiverngs mail har skickas.', 'success');
        return redirect('/login');
    }
}
