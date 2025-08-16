<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getCart()
    {
        /** @var User $user */
        $user = Auth::user();
        $userProducts = $user->userProducts()->with('product')->get();

        $totalQuantity = $userProducts->sum('quantity');
        $totalPrice = $userProducts->sum(function ($userProduct) {
            return $userProduct->getTotalPrice();
        });
        $totalDiscount = $userProducts->sum(function ($userProduct) {
            return $userProduct->getTotalDiscountValue();
        });
        $discountedTotalPrice = $userProducts->sum(function ($userProduct) {
            return $userProduct->getTotalDiscountedPrice();
        });

        return view('cart')->with(['userProducts' => $userProducts, 'discountedTotalPrice' => $discountedTotalPrice,
            'totalDiscount' => $totalDiscount, 'totalQuantity' => $totalQuantity, 'totalPrice' => $totalPrice]);
    }
}
