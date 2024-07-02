<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::all();

        return view('review', [
            'title' => 'Customer Reviews',
            'ratings' => $ratings
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string'
        ]);

        Rating::create([
            'name' => $request->name,
            'rating' => $request->rating,
            'review' => $request->review
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review submitted successfully');
    }
}
