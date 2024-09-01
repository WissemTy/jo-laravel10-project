<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competitions;
use App\Models\Sports;
use App\Models\Places;

class CompetitionController extends Controller
{
    public function index()
    {
        $competitions = Competitions::all();
        $sports = Sports::all();
        $places = Places::all();
        return view('admin.manageCompetitions', compact('competitions', 'sports', 'places'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'sport_id' => 'required|exists:sports,id',
            'place_id' => 'required|exists:places,id',
            'type' => 'required|string',
            'timeStart' => 'required|date',
            'timeEnd' => 'required|date|after:timeStart',
            'price' => 'required|numeric',
        ]);

        $place = Places::find($request->place_id);
        $capacity = $place->capacity ?? 0;
        $competition = new Competitions;
        $competition->place_restante = $capacity;
        $competition->name = $request->name;
        $competition->sport_id = $request->sport_id;
        $competition->place_id = $request->place_id;
        $competition->type = $request->type;
        $competition->timeStart = $request->timeStart;
        $competition->timeEnd = $request->timeEnd;
        $competition->price = $request->price;
        $competition->save();

        return redirect()->route('manageCompetitions')->with('success', 'Competition created successfully');
    }

    public function delete($id)
    {
        $competition = Competitions::findOrFail($id);
        $competition->delete();

        return redirect()->route('manageCompetitions')->with('success', 'Competition deleted successfully');
    }
}
