<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\UserProduct;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function getMain()
    {
        $products = Product::all();
        return view('pages.main')->with('products', $products);
    }

    public function index(string $categoryName = null)
    {
        $categories = Category::all();

        if ($categoryName != null) {
            $category = Category::query()->where('name', $categoryName)->first();
            $products = Product::query()->where('category_id', $category->id)->get();
        }
        else {
            $products = Product::all();
        }
        $counter = count($products);

        return view('products.index')->with(['products' => $products, 'categories' => $categories,
            'categoryName' => $categoryName, 'counter' => $counter]);
    }

    public function getProduct(int $productId)
    {
        $product = Product::query()->findOrFail($productId);

        $userProduct = UserProduct::query()->where(['user_id' => Auth::id(), 'product_id' => $productId])->first();

        return view('products.product')->with(['product' => $product, 'userProduct' => $userProduct]);
    }
}
