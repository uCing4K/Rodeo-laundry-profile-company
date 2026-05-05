<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanySetting;
use App\Models\Product;
use App\Models\ServiceCategory;
use App\Models\ServiceType;
use App\Models\TeamMember;
use App\Models\PageContent;
use App\Models\Order;

class WebController extends Controller
{
    public function index()
    {
        $companySetting = CompanySetting::group('company');
        $products = Product::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->limit(6)
            ->get();

        return view('index', [
            'companySetting' => $companySetting,
            'products' => $products,
        ]);
    }

    public function services()
    {
        $categories = ServiceCategory::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        $products = Product::where('is_active', true)
            ->with(['category'])
            ->orderBy('name', 'asc')
            ->get();

        $serviceTypes = ServiceType::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('services', [
            'categories' => $categories,
            'products' => $products,
            'serviceTypes' => $serviceTypes,
        ]);
    }

    public function about()
    {
        $teamMembers = TeamMember::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        $pageContent = PageContent::forPage('about');

        return view('about', [
            'teamMembers' => $teamMembers,
            'pageContent' => $pageContent,
        ]);
    }

    public function contact()
    {
        $companySetting = CompanySetting::group('company');

        return view('contact', [
            'companySetting' => $companySetting,
        ]);
    }

    public function tracking(Request $request)
    {
        $query = $request->query('query');
        $order = null;

        if ($query) {
            $order = Order::where('order_number', 'like', "%{$query}%")
                ->orWhere('tracking_token', 'like', "%{$query}%")
                ->with('items')
                ->first();
        }

        return view('tracking', [
            'order' => $order,
            'query' => $query,
        ]);
    }

    public function faq()
    {
        return view('faq');
    }
}
