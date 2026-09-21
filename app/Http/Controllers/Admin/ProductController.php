<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('categories')->get();

        return view('admin.products.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'gender' => 'required|string|max:50',
            'age' => 'required|integer|min:0',
            'height' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'blood_type' => 'required|string|max:10',
            'region' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'available' => 'required|boolean',
            'premium' => 'required|boolean',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => null,
            'gender' => $request->gender,
            'age' => $request->age,
            'height' => $request->height,
            'weight' => $request->weight,
            'blood_type' => $request->blood_type,
            'region' => $request->region,
            'status' => $request->status,
            'available' => $request->available,
            'premium' => $request->premium,
        ]);

        $product->categories()->sync($request->categories ?? []);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Profil ajouté avec succès.');
    }


    public function edit(string $id)
    {
        $product = Product::with('categories')->findOrFail($id);
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'gender' => 'required|string|max:50',
            'age' => 'required|integer|min:0',
            'height' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'blood_type' => 'required|string|max:10',
            'region' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'available' => 'required|boolean',
            'premium' => 'required|boolean',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'gender' => $request->gender,
            'age' => $request->age,
            'height' => $request->height,
            'weight' => $request->weight,
            'blood_type' => $request->blood_type,
            'region' => $request->region,
            'status' => $request->status,
            'available' => $request->available,
            'premium' => $request->premium,
        ]);

        $product->categories()->sync($request->categories ?? []);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Profil modifié avec succès.');
    }


    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->categories()->detach();
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Profil supprimé avec succès.');
    }
}