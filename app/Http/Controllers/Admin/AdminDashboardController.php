<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\ServiceCategory;
use App\Models\ServiceType;
use App\Models\Testimonial;
use App\Models\CompanySetting;
use App\Models\OperatingHour;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_categories' => ServiceCategory::count(),
            'total_faq' => Faq::count(),
            'total_testimonials' => Testimonial::count(),
            'total_service_types' => ServiceType::count(),
        ];

        $categories = ServiceCategory::with('serviceType')->get();
        $service_types = ServiceType::all();
        $faqs = Faq::all();
        $testimonials = Testimonial::all();
        $company_settings = CompanySetting::first();
        $operating_hours = OperatingHour::all();

        return view('admin.dashboard', compact(
            'stats', 
            'categories', 
            'service_types', 
            'faqs', 
            'testimonials', 
            'company_settings', 
            'operating_hours'
        ));
    }
}
