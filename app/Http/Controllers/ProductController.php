<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('product.index', compact('products'));
    }

    public function create()
    {

        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'category_id' => 'required|exists:categories,id'
        ]);

        $path = null;
        $filename = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/product/';
            $file->move($path, $filename);
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path . $filename,
            'category_id' => $request->category_id,
        ]);

        return redirect('products/create')->with('status', 'Product Created');
    }

    public function edit(int $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Fetch all categories
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'category_id' => 'required|exists:categories,id'
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/product/';
            $file->move($path, $filename);

            if (File::exists($product->image)) {
                File::delete($product->image);
            }
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path . $filename,
            'category_id' => $request->category_id,
        ]);

        return redirect()->back()->with('status', 'Product Updated');
    }

    public function destroy(int $id)
    {
        $product = Product::findOrFail($id);
        if (File::exists($product->image)) {
            File::delete($product->image);
        }

        $product->delete();

        return redirect()->back()->with('status', 'Product Deleted');
    }
}
