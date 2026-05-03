<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Testimonial;
use App\Models\OperatingHour;

class PublicController extends Controller
{
    public function faq()
    {
        $data = Faq::all();

        return response()->json([
            'success' => true,
            'data'    => $data,
        ]);
    }

    public function testimonials()
    {
        $data = Testimonial::all();

        return response()->json([
            'success' => true,
            'data'    => $data,
        ]);
    }

    public function operatingHours()
    {
        $data = OperatingHour::all();

        return response()->json([
            'success' => true,
            'data'    => $data,
        ]);
    }
}