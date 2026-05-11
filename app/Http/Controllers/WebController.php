<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanySetting;
use App\Models\ServiceCategory;
use App\Models\ServiceType;
use App\Models\Faq;
use App\Models\Testimonial;
use App\Models\OperatingHour;

class WebController extends Controller
{
    public function index()
    {
        $companySetting = CompanySetting::first();
        $categories = ServiceCategory::limit(6)->get();
        $testimonials = Testimonial::all();
        $popularServices = ServiceCategory::where('is_popular', true)->with('serviceType')->get();

        return view('index', [
            'companySetting'  => $companySetting,
            'categories'      => $categories,
            'testimonials'    => $testimonials,
            'popularServices' => $popularServices,
        ]);
    }

    public function services()
    {
        $categories = ServiceCategory::with('serviceType')->get();
        $serviceTypes = ServiceType::all();

        $regulerCategories = $categories->filter(function($cat) {
            return $cat->serviceType && strtolower($cat->serviceType->name) === 'reguler';
        });
        
        $premiumCategories = $categories->filter(function($cat) {
            return $cat->serviceType && strtolower($cat->serviceType->name) === 'premium';
        });
        
        $otherCategories = $categories->filter(function($cat) {
            if (!$cat->serviceType) return true;
            $name = strtolower($cat->serviceType->name);
            return $name !== 'reguler' && $name !== 'premium';
        });

        return view('services', [
            'regulerCategories' => $regulerCategories,
            'premiumCategories' => $premiumCategories,
            'otherCategories'   => $otherCategories,
            'serviceTypes'      => $serviceTypes,
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        $companySetting = CompanySetting::first();
        $operatingHours = OperatingHour::all();

        return view('contact', [
            'companySetting' => $companySetting,
            'operatingHours' => $operatingHours,
        ]);
    }

    public function tracking(Request $request)
    {
        $query = $request->query('query');
        
        return view('tracking', [
            'query' => $query,
        ]);
    }

    public function faq()
    {
        $data = Faq::all();

        return view('faq', [
            'faq' => $data,
        ]);
    }

    public function testimonials()
    {
        $data = Testimonial::all();

        return view('index', [
            'testimonials' => $data,
        ]);
    }

    public function operatingHours()
    {
        $data = OperatingHour::all();
        $companySetting = CompanySetting::first();

        return view('contact', [
            'operatingHours' => $data,
            'companySetting' => $companySetting,
        ]);
    }
}
