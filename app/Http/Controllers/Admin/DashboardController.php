<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\Service;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            // 'portfolios' => Portfolio::count(),
            'testimonials' => Testimonial::count(),
            'unread_messages' => ContactMessage::unread()->count(),
            'total_messages' => ContactMessage::count(),
            'productCount' => Product::count(),
        ];

        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }
}
