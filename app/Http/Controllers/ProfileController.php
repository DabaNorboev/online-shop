<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $user = User::query()->find(Auth::id());

        $orders = Order::query()->where('user_id', $user->id)->get();

        return view('profile')->with(['user' => $user, 'orders' => $orders]);
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = User::query()->findOrFail(Auth::id());

        $user->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
        ]);

        return redirect()->back();
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = User::query()->findOrFail(Auth::id());

        if (!Hash::check($request['old_password'], $user->password)) {
            return redirect()->back()->withErrors('Текущий пароль указан не верно');
        }

        $user->update([
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->back();
    }
}
