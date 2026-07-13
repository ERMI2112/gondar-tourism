<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuideRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{

    public function index()
    {
        $requests = GuideRequest::with(['guide.user', 'attraction'])->latest()->paginate(15);
        return view('admin.requests.index', compact('requests'));
    }

    public function update(Request $request, GuideRequest $guideRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected,completed',
        ]);
        $guideRequest->update($validated);
        return back()->with('success', 'Status updated.');
    }
}
