<?php

namespace App\Http\Controllers\Auth;

use App\Mail\Auth\ActivationEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class ActivationController extends Controller
{
    /**
     * Send activation email to user
     * @param User $user
     */
    public static function SendActivationEmail(User $user){
    	if ($user->active){
    		return;
    	}

    	Mail::to($user->email)->send(new ActivationEmail($user));
    }

    /**
     * Activre users account
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activate(Request $request){
        $user = User::where('email', $request->email)->where('activation_token', $request->token)->first();
        if(!$user){
            notify()->flash('Vi kunde inte ditt konto eller så har du redan aktiverat ditt konto', 'info');
            return redirect('/login');
        }

        $user->update([
            'activate' => true,
            'activation_token' => null
        ]);

        Auth::loginUsingId($user->id);
        notify()->flash('Ditt kontot är nu aktiverat', 'success');
        return redirect()->route('profile');
    }
}
