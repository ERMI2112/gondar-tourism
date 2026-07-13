<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use App\Models\Category;

class AttractionController extends Controller
{
    public function index()
    {
        $attractions = Attraction::with('category')->latest()->paginate(12);
        $categories = Category::all();
        return view('attractions.index', compact('attractions', 'categories'));
    }

    public function show(Attraction $attraction)
    {
        return view('attractions.show', compact('attraction'));
    }
}
