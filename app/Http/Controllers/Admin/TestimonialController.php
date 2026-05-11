<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Testimonial::create($validated);

        return redirect(route('admin.dashboard') . '#testimonials')
            ->with('success', 'Testimoni berhasil ditambahkan.');
    }



    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $testimonial->update($validated);

        return redirect(route('admin.dashboard') . '#testimonials')
            ->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect(route('admin.dashboard') . '#testimonials')
            ->with('success', 'Testimoni berhasil dihapus.');
    }
}
