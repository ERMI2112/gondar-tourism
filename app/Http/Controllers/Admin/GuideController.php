<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guide;

class GuideController extends Controller
{


    public function index()
    {
        $guides = Guide::with('user')->latest()->paginate(15);
        return view('admin.guides.index', compact('guides'));
    }

    public function approve(Guide $guide)
    {
        $guide->update(['approval_status' => 'approved']);
        return back()->with('success', 'Guide approved.');
    }

    public function reject(Guide $guide)
    {
        $guide->update(['approval_status' => 'rejected']);
        return back()->with('success', 'Guide rejected.');
    }
}
