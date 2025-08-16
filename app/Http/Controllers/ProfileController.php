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
        /** @var User $user */
        $user = Auth::user();

        $orders = Order::query()->where('user_id', $user->id)->get();

        return view('profile')->with(['user' => $user, 'orders' => $orders]);
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $user->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
        ]);

        return redirect()->back();
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();

        if (!Hash::check($request['old_password'], $user->password)) {
            return redirect()->back()->withErrors('Текущий пароль указан не верно');
        }

        $user->update([
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->back();
    }
}
