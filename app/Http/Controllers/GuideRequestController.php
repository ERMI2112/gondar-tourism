<?php

namespace App\Http\Controllers;

use App\Models\GuideRequest;
use Illuminate\Http\Request;

class GuideRequestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tourist_name' => 'required|string',
            'tourist_email' => 'required|email',
            'tourist_phone' => 'nullable|string',
            'guide_id' => 'nullable|exists:guides,id',
            'attraction_id' => 'nullable|exists:attractions,id',
            'visit_date' => 'nullable|date',
            'group_size' => 'nullable|integer|min:1',
            'message' => 'nullable|string',
        ]);

        GuideRequest::create($validated);

        return back()->with('success', 'Request submitted successfully. A guide will contact you soon.');
    }
}
