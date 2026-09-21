<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')
            ->where('available', true)
            ->latest()
            ->get();

        return view('products.index', compact('products'));
    }

    public function discover()
    {
        $products = Product::with('categories')
            ->where('available', true)
            ->latest()
            ->get();

        return view('products.discover', compact('products'));
    }
}