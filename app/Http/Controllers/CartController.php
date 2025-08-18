<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProduct;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getCart()
    {
        /** @var User $user */
        $user = Auth::user();
        $userProducts = $user->userProducts()->with('product')->orderBy('id')->get();

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

    public function add(int $id)
    {
        /** @var User $user */
        $user = Auth::user();

        $userProduct = $user->userProducts()->with('product')->where('product_id', $id)->first();

        if (is_null($userProduct)) {
            UserProduct::query()->create([
                'user_id' => $user->id,
                'product_id' => $id,
                'quantity' => 1,
            ]);
        }
        else {
            $userProduct->increment('quantity');
        }

        return redirect()->back();
    }

    public function delete(int $id)
    {
        /** @var User $user */
        $user = Auth::user();

        $userProducts = $user->userProducts()->findOrFail($id);
        $userProducts->delete();

        return redirect()->back();
    }

    public function increase(UserProduct $userProduct)
    {
        $userProduct->increment('quantity');

        return redirect()->back();
    }

    public function decrease(UserProduct $userProduct)
    {
        if ($userProduct->quantity > 1) {
            $userProduct->decrement('quantity');
        }
        elseif ($userProduct->quantity === 1) {
            $userProduct->delete();
        }

        return redirect()->back();
    }
}
