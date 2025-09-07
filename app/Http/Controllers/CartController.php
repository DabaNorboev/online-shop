<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\ChangeCartQuantityRequest;
use App\Models\User;
use App\Models\UserProduct;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
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

        return view('cart.index')->with(['userProducts' => $userProducts, 'discountedTotalPrice' => $discountedTotalPrice,
            'totalDiscount' => $totalDiscount, 'totalQuantity' => $totalQuantity, 'totalPrice' => $totalPrice]);
    }

    public function addItem(AddToCartRequest $request, int $id)
    {

        /** @var User $user */
        $user = Auth::user();

        $userProduct = $user->userProducts()->with('product')->where('product_id', $id)->first();

        if (is_null($userProduct)) {
            UserProduct::query()->create([
                'user_id' => $user->id,
                'product_id' => $id,
                'quantity' => $request->input('quantity',1),
            ]);
        }
        else {
            $userProduct->increment('quantity');
        }

        return redirect()->back();
    }

    public function updateItem(ChangeCartQuantityRequest $request, int $id)
    {
        /** @var User $user */
        $user = Auth::user();

        $userProduct = $user->userProducts()->findOrFail($id);

        $quantity = $request->input('quantity');

        if ($quantity < 1)
        {
            $userProduct->delete();

        } elseif ($quantity > $userProduct->product->stock_quantity)
        {
            return redirect()->back()->withErrors('Нельзя добавить '.$quantity.' единиц данного товара. В наличии доступно - '
                .$userProduct->product->stock_quantity.' единиц.');
        } else
        {
            $userProduct->update(['quantity' => $quantity]);
        }

        return redirect()->back();
    }

    public function increaseItem(int $id)
    {
        /** @var User $user */
        $user = Auth::user();

        $userProduct = $user->userProducts()->findOrFail($id);

        if ($userProduct->quantity === $userProduct->product->stock_quantity)
        {
            return redirect()->back()->withErrors('Нельзя добавить в корзину '.$userProduct->quantity.
                ' единиц данного товара. В наличии доступно - ' .$userProduct->product->stock_quantity.' единиц.');
        }

        $userProduct->increment('quantity');

        return redirect()->back();
    }

    public function decreaseItem(int $id)
    {
        /** @var User $user */
        $user = Auth::user();

        $userProduct = $user->userProducts()->findOrFail($id);

        if ($userProduct->quantity === 1)
        {
            $userProduct->delete();
        } else {
            $userProduct->decrement('quantity');
        }

        return redirect()->back();
    }

    public function deleteItem(int $id)
    {
        /** @var User $user */
        $user = Auth::user();

        $userProduct = $user->userProducts()->findOrFail($id);
        $userProduct->delete();

        return redirect()->back();
    }

    public function clear()
    {
        /** @var User $user */
        $user = Auth::user();

        $user->userProducts()->delete();

        return redirect()->back();
    }
}
