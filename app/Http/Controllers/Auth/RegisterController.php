<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:50'],
            'lname' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'role_id' => ['required'],
            'password' => ['required', 'string', 'min:8', 'max:12', 'confirmed']
        ], [
            'fname.required' => "Šis lauks ir obligāts",
            'fname.max' => "Šis lauks nevar būt garāks par :max rakstzīmēm",
            'lname.required' => "Šis lauks ir obligāts",
            'lname.max' => "Šis lauks nevar būt garāks par :max rakstzīmēm",
            'email.required' => "Šis lauks ir obligāts",
            'email.email' => "E-pastam ir jābūt derīgai e-pasta adresei",
            'email.max' => "Šis lauks nevar būt garāks par :max rakstzīmēm",
            'email.unique' => "E-pasts jau ir aizņemts",
            'role_id.required' => "Šis lauks ir obligāts",
            'password.required' => "Šis lauks ir obligāts",
            'password.max' => "Parole nevar būt garāka par :max rakstzīmēm",
            'password.min' => "Parole nevar būt īsāka par :min rakstzīmēm",
            'password.confirmed' => "Paroles nesakrīt"
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'role_id' => $data['role_id'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
