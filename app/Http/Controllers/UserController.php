<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController
{
    public function getSignUp()
    {
        return view('signUp');
    }

    public function signUp(SignUpRequest $request)
    {
        $data = $request->all();
        User::query()->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('login.form');
    }

    public function getLogin()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $result = Auth::attempt([
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

    public function getProfile()
    {
        return view('profile');
    }
}
