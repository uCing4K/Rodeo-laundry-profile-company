<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanySetting;
use Illuminate\Http\Request;

class CompanySettingController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|string|max:20',
            'whatsapp_link' => 'required|url|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'map_embed' => 'required|string',
            'seo_description' => 'nullable|string',
        ]);

        $setting = CompanySetting::first();
        
        if ($setting) {
            $setting->update($validated);
        } else {
            CompanySetting::create($validated);
        }

        return redirect(route('admin.dashboard') . '#settings')->with('success', 'Pengaturan perusahaan berhasil diperbarui.');
    }
}
