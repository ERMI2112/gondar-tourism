<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('start_date')->paginate(12);
        return view('events.index', compact('events'));
    }
}
