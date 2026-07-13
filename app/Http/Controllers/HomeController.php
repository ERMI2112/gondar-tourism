<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use App\Models\Event;
use App\Models\Guide;
use App\Models\Hotel;

class HomeController extends Controller
{
    public function index()
    {
        $attractions = Attraction::with('category')->latest()->take(6)->get();
        $events = Event::orderBy('start_date')->take(3)->get();
        $guides = Guide::where('approval_status', 'approved')->with('user')->latest()->take(4)->get();
        $hotels = Hotel::latest()->take(4)->get();

        return view('home', compact('attractions', 'events', 'guides', 'hotels'));
    }
}
