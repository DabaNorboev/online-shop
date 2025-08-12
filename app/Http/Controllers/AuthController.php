<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getSignUp()
    {
        return view('signUp');
    }

    public function signUp(SignUpRequest $request)
    {
        User::query()->create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('login.form');
    }

    public function getLogin()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]);

        return redirect()->route('main');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
