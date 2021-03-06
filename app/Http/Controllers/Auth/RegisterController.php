<?php

namespace App\Http\Controllers\Auth;

use App\Rules\checkBorn;
use App\Rules\User\checkMailDomain;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ActivationController;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', new checkMailDomain()],
            'nick' => 'required|string|max:255|unique:users',
            'born' => ['required', new checkBorn()],
            'password' => 'required|string|min:8|confirmed',
            'participant_type' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'nick' => $data['nick'],
            'born' => $data['born'],
            'password' => bcrypt($data['password']),
            'activate' => false,
            'activation_token' => str_random(225),
            'participant_type' => $data['participant_type'],
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        ActivationController::SendActivationEmail($user);
        Auth::logout();
        notify()->flash('Ditt konto är nu skapat! Du har fått ett mail där du kan aktivera ditt konto.', 'success');
        return redirect('/login');
    }
}
