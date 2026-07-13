<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        Feedback::create($validated);

        return back()->with('success', 'Thank you for your feedback!');
    }
}
