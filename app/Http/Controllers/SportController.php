<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sports;

class SportController extends Controller
{
    public function index()
    {
        $sports = Sports::all();
        return view('admin.manageSports', compact('sports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sports',
        ]);

        Sports::create([
            'name' => $request->name,
        ]);

        return redirect()->route('manageSports');
    }

    public function delete($id)
    {
        $sport = Sports::findOrFail($id);
        $sport->delete();
        return redirect()->route('manageSports')->with('success', 'Sport deleted successfully');
    }
}
