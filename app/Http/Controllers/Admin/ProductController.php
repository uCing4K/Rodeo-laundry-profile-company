<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
    {
        return redirect()->route('admin.dashboard')->withFragment('services');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:service_categories,id',
            'unit' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'description' => 'nullable|string',
        ]);

        $validated['slug']      = Str::slug($validated['name'] . '-' . uniqid());
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $request->input('sort_order', 0);

        Product::create($validated);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Layanan berhasil ditambahkan.')
            ->withFragment('services');
    }

    public function edit(Product $product)
    {
        return redirect()->route('admin.dashboard')
            ->with('edit_product', $product)
            ->withFragment('services');
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:service_categories,id',
            'unit' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'sort_order'  => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'description' => 'nullable|string',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $request->input('sort_order', $product->sort_order);

        $product->update($validated);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Layanan berhasil diperbarui.')
            ->withFragment('services');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Layanan berhasil dihapus.')
            ->withFragment('services');
    }
}
