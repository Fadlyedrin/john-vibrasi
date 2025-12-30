<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(12);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
            'images'      => 'nullable|array',
            'images.*'    => 'image|max:2048',
            'drive_link'  => 'nullable|url|max:500',
            'is_featured' => 'boolean',
            'is_active'   => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        if ($request->hasFile('images')) {
            $paths = [];
            foreach ($request->file('images') as $img) {
                $paths[] = $img->store('products', 'public');
            }
            $data['images'] = $paths;
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
            'images'      => 'nullable|array',
            'images.*'    => 'image|max:2048',
            'drive_link'  => 'nullable|url|max:500',
            'is_featured' => 'boolean',
            'is_active'   => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        if ($request->hasFile('images')) {
            if ($product->images) {
                foreach ($product->images as $old) {
                    Storage::disk('public')->delete($old);
                }
            }

            $paths = [];
            foreach ($request->file('images') as $img) {
                $paths[] = $img->store('products', 'public');
            }
            $data['images'] = $paths;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        if ($product->images) {
            foreach ($product->images as $img) {
                Storage::disk('public')->delete($img);
            }
        }

        $product->delete();

        return back()->with('success', 'Product deleted');
    }
}

