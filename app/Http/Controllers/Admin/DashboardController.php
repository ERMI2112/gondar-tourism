<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use App\Models\Guide;
use App\Models\GuideRequest;
use App\Models\Event;
use App\Models\Feedback;

class DashboardController extends Controller
{


    public function index()
    {
        $stats = [
            'attractions' => Attraction::count(),
            'guides' => Guide::count(),
            'pending_guides' => Guide::where('approval_status', 'pending')->count(),
            'requests' => GuideRequest::count(),
            'events' => Event::count(),
            'feedback' => Feedback::count(),
        ];

        $recentRequests = GuideRequest::with('guide.user')->latest()->take(5)->get();
        return view('admin.dashboard', compact('stats', 'recentRequests'));
    }
}
