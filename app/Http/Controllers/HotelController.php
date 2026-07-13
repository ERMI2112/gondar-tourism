<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type');

        $hotels = Hotel::active()
            ->when($type, fn($q) => $q->where('type', $type))
            ->orderByDesc('stars')
            ->paginate(9);

        return view('hotels.index', compact('hotels', 'type'));
    }

    public function show(Hotel $hotel)
    {
        return view('hotels.show', compact('hotel'));
    }
}
