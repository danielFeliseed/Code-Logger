<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Card;
use App\Models\Deck;


class CardController extends Controller
{
    public function index()
    {   
        $cards = Card::with('cards')->get();
        return Inertia::render('Decks/Show', [
            'cards' => $cards,
            'user' => auth()->user()
        ]);
    }

    public function show($card)
    {
        return Inertia::render('Cards/Show');
    }

    public function create() 
    {
        return Inertia::render('Cards/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'front' => 'required',
            'back' => 'required',
            'deck_id' => 'required|integer',
        ]);
        $card = Card::create([
            'front' => $request->front,
            'back' => $request->back,
            'deck_id' => $request->deck_id,
            'user_id' => $request->user()->id,
        ]);
        return to_route('decks');
    }
}
