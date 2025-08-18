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

        $orders = Order::query()->where('user_id', $user->id)->with(['orderItems.product', 'status'])->get();

        return view('profile')->with(['orders' => $orders, 'user' => $user]);
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
            return redirect()->back();
        }

        $user->update([
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->back();
    }
}
