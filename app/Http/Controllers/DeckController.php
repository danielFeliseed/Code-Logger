<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;



class DeckController extends Controller
{
    public function index()
    {
        return Inertia::render('Decks');

    }

    public function show($deck)
    {
        return Inertia::render('Decks/Show', [
            'deck' => $deck,
        ]);
    }

    public function create() 
    {
        return Inertia::render('Decks/Create');
    }

    public function store(Request $request)
    {
        $deck = Deck::create($request->all());
        return redirect()->route('decks.show', $deck);
    }

    public function edit($deck)
    {
        return Inertia::render('Decks/Edit', [
            'deck' => $deck,
        ]);
    }
}
