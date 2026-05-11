<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'estimated_duration' => 'nullable|string|max:255',
            'additional_cost' => 'nullable|numeric|min:0',
        ]);

        ServiceType::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Tipe layanan berhasil ditambahkan.');
    }

    public function update(Request $request, ServiceType $serviceType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'estimated_duration' => 'nullable|string|max:255',
            'additional_cost' => 'nullable|numeric|min:0',
        ]);

        $serviceType->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Tipe layanan berhasil diperbarui.');
    }

    public function destroy(ServiceType $serviceType)
    {
        $serviceType->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Tipe layanan berhasil dihapus.');
    }
}
