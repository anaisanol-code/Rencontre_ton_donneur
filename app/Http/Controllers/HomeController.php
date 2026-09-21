<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('available', true)
            ->latest()
            ->take(3)
            ->get();

        $categories = Category::withCount('products')
            ->orderBy('name')
            ->get();

        return view('welcome', compact('products', 'categories'));
    }
}