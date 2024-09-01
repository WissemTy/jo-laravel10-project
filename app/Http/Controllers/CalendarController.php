<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competitions;
use App\Models\Sports;
use App\Models\Places;

class CalendarController extends Controller
{

    public function index()
{
    $competitions = Competitions::all();
    $sports = Sports::all();
    $places = Places::all();
    return view('calendar', compact('sports', 'places', 'competitions'));
}
public function showReservationView(Request $request)
{
    return view('reservation.create');
}

public function filter(Request $request)
{
    $sportId = $request->input('sport');
    $placeId = $request->input('place');
    $sortBy = $request->input('sort');

    $sports = Sports::all();
    $places = Places::all();

    $query = Competitions::query();

    if ($sportId) {
        $query->where('sport_id', $sportId);
    }

    if ($placeId) {
        $query->where('place_id', $placeId);
    }

    if ($sortBy) {
        switch ($sortBy) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'date_asc':
                $query->orderBy('timeStart', 'asc');
                break;
            case 'date_desc':
                $query->orderBy('timeStart', 'desc');
                break;
            default:
                $query->orderBy('timeStart', 'desc');
        }
    }

    $filteredCompetitions = $query->get();

    return view('calendar', compact('sports', 'places', 'filteredCompetitions'));
}
    
}