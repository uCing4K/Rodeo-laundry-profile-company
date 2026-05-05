<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Order;
use App\Models\Product;
use App\Models\ServiceCategory;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_categories' => ServiceCategory::count(),
            'total_products' => Product::where('is_active', true)->count(),
            'orders_today' => Order::whereDate('created_at', today())->count(),
            'total_faq' => Faq::where('is_active', true)->count(),
        ];

        $recent_orders = Order::with('customer')
            ->latest()
            ->limit(5)
            ->get();

        $products = Product::with('category')
            ->orderBy('category_id')
            ->orderBy('sort_order')
            ->get();

        $categories = ServiceCategory::orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_orders', 'products', 'categories'));
    }
}
