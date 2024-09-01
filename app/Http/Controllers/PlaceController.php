<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Places;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Places::all();
        return view('admin.managePlaces', compact('places'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'capacity' => 'required|numeric',
        ]);

        Places::create([
            'name' => $request->name,
            'description' => $request->description,
            'capacity' => $request->capacity,
        ]);

        return redirect()->route('managePlaces')->with('success', 'Place created successfully');
    }

    public function delete($id)
    {
        $place = Places::findOrFail($id);
        $place->delete();
        return redirect()->route('managePlaces')->with('success', 'Place deleted successfully');
    }
}
