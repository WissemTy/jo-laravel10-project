<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competitions;
use App\Models\Spectators;
use App\Models\Reservations;

class ReservationController extends Controller
{
    public function create()
    {
        $competitions = Competitions::all();
        return view('reservation', compact('competitions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'firstName' => 'required|string',
            'email' => 'required|email',
            'competition' => 'required|exists:competitions,id',
            'numberOfPlaces' => 'required|integer|min:1|max:5',
            'names.*' => 'required|string',
            'firstNames.*' => 'required|string',
        ]);

        $spectator = Spectators::create([
            'name' => $request->name,
            'firstName' => $request->firstName,
            'email' => $request->email,
        ]);

        for ($i = 0; $i < $request->numberOfPlaces - 1; $i++) {
            Spectators::create([
                'name' => $request->names[$i],
                'firstName' => $request->firstNames[$i],
            ]);
        }

        $competition = Competitions::findOrFail($request->competition);
        $competition->place_restante -= $request->numberOfPlaces;
        $competition->save();

        Reservations::create([
            'spectator_id' => $spectator->id,
            'competition_id' => $request->competition,
            'number_of_places' => $request->numberOfPlaces,
        ]);

        return redirect()->route('reservation.create');
    }
}
