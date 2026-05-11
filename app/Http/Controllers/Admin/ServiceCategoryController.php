<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'product' => 'nullable|string|max:255',
            'unit' => 'nullable|string|max:50',
            'base_price' => 'required|numeric|min:0',
            'service_type_id' => 'nullable|exists:service_types,id',
            'description' => 'nullable|string',
        ]);

        if (!empty($validated['service_type_id'])) {
            $serviceType = ServiceType::find($validated['service_type_id']);
            if ($serviceType) {
                $validated['base_price'] += $serviceType->additional_cost;
            }
        }

        ServiceCategory::create($validated);

        return redirect(route('admin.dashboard') . '#services')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'product' => 'nullable|string|max:255',
            'unit' => 'nullable|string|max:50',
            'base_price' => 'required|numeric|min:0',
            'service_type_id' => 'nullable|exists:service_types,id',
            'description' => 'nullable|string',
        ]);

        if (!empty($validated['service_type_id'])) {
            $serviceType = ServiceType::find($validated['service_type_id']);
            if ($serviceType) {
                $validated['base_price'] += $serviceType->additional_cost;
            }
        }

        $serviceCategory->update($validated);

        return redirect(route('admin.dashboard') . '#services')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(ServiceCategory $serviceCategory)
    {
        $serviceCategory->delete();
        return redirect(route('admin.dashboard') . '#services')->with('success', 'Layanan berhasil dihapus.');
    }

    public function togglePopular(Request $request, ServiceCategory $serviceCategory)
    {
        $serviceCategory->update([
            'is_popular' => !$serviceCategory->is_popular
        ]);

        $status = $serviceCategory->is_popular ? 'ditambahkan ke' : 'dihapus dari';
        return redirect(route('admin.dashboard') . '#popular-services')->with('success', "Layanan berhasil {$status} daftar populer.");
    }
}
