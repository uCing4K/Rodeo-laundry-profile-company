<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OperatingHour;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OperatingHourController extends Controller
{

    public function update(Request $request, OperatingHour $operatingHour)
    {
        \Log::info('OperatingHour update request', [
            'id' => $operatingHour->id,
            'data' => $request->all()
        ]);

        $validated = $request->validate([
            'open_time' => 'required_unless:is_closed,1|date_format:H:i',
            'closed_time' => 'required_unless:is_closed,1|date_format:H:i',
            'is_closed' => 'required|in:0,1',
        ]);

        // Convert string values to integer for boolean column
        $validated['is_closed'] = (bool) (int) $validated['is_closed'];

        $operatingHour->update($validated);

        return redirect('/admin/dashboard#hours')
            ->with('success', 'Jam operasional berhasil diperbarui.');
    }
}
