<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuideController extends Controller
{
    public function index()
    {
        $guides = Guide::where('approval_status', 'approved')->with('user')->latest()->paginate(12);
        return view('guides.index', compact('guides'));
    }

    public function show(Guide $guide)
    {
        return view('guides.show', compact('guide'));
    }

    public function create()
    {
        return view('guides.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|string',
            'languages' => 'required|string',
            'specialization' => 'nullable|string',
            'license_number' => 'nullable|string',
            'bio' => 'nullable|string',
            'price_range' => 'nullable|string',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'guide',
            'phone' => $validated['phone'],
        ]);

        Guide::create([
            'user_id' => $user->id,
            'phone' => $validated['phone'],
            'languages' => $validated['languages'],
            'specialization' => $validated['specialization'] ?? null,
            'license_number' => $validated['license_number'] ?? null,
            'bio' => $validated['bio'] ?? null,
            'price_range' => $validated['price_range'] ?? null,
            'approval_status' => 'pending',
        ]);

        return redirect()->route('guides.index')->with('success', 'Guide registration submitted. Waiting for approval.');
    }
}
