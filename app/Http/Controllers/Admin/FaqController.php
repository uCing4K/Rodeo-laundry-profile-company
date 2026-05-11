<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        Faq::create($validated);

        return redirect(route('admin.dashboard') . '#faq')
            ->with('success', 'FAQ berhasil ditambahkan.');
    }



    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $faq->update($validated);

        return redirect(route('admin.dashboard') . '#faq')
            ->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect(route('admin.dashboard') . '#faq')
            ->with('success', 'FAQ berhasil dihapus.');
    }
}