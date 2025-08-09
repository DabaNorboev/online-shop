<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController
{
    public function signUpForm(Request $request)
    {
        return view('signUp');
    }

    public function signUp(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6|confirmed|max:255',
            'password_confirmation' => 'required',
        ]);

        User::query()->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('main');
    }

    public function loginForm(Request $request)
    {
        return view('login');
    }

    public function login(Request $request)
    {

    }

    public function main(Request $request) {
        return view('main');
    }
}
