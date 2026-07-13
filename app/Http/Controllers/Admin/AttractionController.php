<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use App\Models\Category;
use Illuminate\Http\Request;

class AttractionController extends Controller
{


    public function index()
    {
        $attractions = Attraction::with('category')->latest()->paginate(15);
        return view('admin.attractions.index', compact('attractions'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.attractions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'history' => 'nullable|string',
            'location_name' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'opening_hours' => 'nullable|string',
            'ticket_price' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('attractions', 'public');
        }

        Attraction::create($validated);
        return redirect()->route('admin.attractions.index')->with('success', 'Attraction created.');
    }

    public function edit(Attraction $attraction)
    {
        $categories = Category::all();
        return view('admin.attractions.edit', compact('attraction', 'categories'));
    }

    public function update(Request $request, Attraction $attraction)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'history' => 'nullable|string',
            'location_name' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'opening_hours' => 'nullable|string',
            'ticket_price' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('attractions', 'public');
        }

        $attraction->update($validated);
        return redirect()->route('admin.attractions.index')->with('success', 'Attraction updated.');
    }

    public function destroy(Attraction $attraction)
    {
        $attraction->delete();
        return back()->with('success', 'Attraction deleted.');
    }
}
