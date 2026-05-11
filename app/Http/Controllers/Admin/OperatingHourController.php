<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OperatingHour;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OperatingHourController extends Controller
{
    public function edit(OperatingHour $operating_hour)
    {
        return redirect()->route('admin.dashboard')
            ->with('edit_operating_hour', $operating_hour->toArray())
            ->withFragment('hours');
    }

    public function update(Request $request, OperatingHour $operating_hour)
    {
        $validated = $request->validate([
            'day' => [
                'required',
                'string',
                Rule::in(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']),
                Rule::unique('operating_hours', 'day')->ignore($operating_hour->id),
            ],
            'open_time' => 'required_unless:is_closed,1|date_format:H:i',
            'closed_time' => 'required_unless:is_closed,1|date_format:H:i',
            'is_closed' => 'required|in:0,1',
        ]);

        // Convert string values to integer for boolean column
        $validated['is_closed'] = (bool) (int) $validated['is_closed'];

        $operating_hour->update($validated);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Jam operasional berhasil diperbarui.')
            ->withFragment('hours');
    }
}
