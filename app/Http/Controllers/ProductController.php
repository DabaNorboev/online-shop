<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getMain()
    {
        $products = Product::all();
        return view('main')->with('products', $products);
    }

    public function getCatalog($categoryName = null)
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

        return view('catalog')->with(['products' => $products, 'categories' => $categories, 'categoryName' => $categoryName, 'counter' => $counter]);
    }
}
