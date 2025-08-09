<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController
{
    public function signUpForm()
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

    public function loginForm()
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
