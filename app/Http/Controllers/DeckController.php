<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Deck;
use App\Models\Card;



class DeckController extends Controller
{
    public function index()
    {
        $decks = Deck::with('cards')->get();
        return Inertia::render('Decks', [
            'decks' => $decks,
            'user' => auth()->user()
        ]);
    }

    public function show($deck)
    {
        
        return Inertia::render('Decks/Show');
    }

    public function create() 
    {
        // $decks = Deck::create([
        //     'user_id' => $request->user()->id,
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'color' => $request->color,
        //     'category_id' => $request->category_id,
        // ]);
        // return Inertia::render('Decks/Create');
        // route_to('decks.show', $decks->id);

    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            
        ]);
        $decks = Deck::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'color' => $request->color,
            'category_id' => $request->category_id,
        ]);
        return to_route('decks', $decks->id);
    }

    public function edit($deck)
    {
        
        return Inertia::render('Decks/Edit', [
            'deck' => $deck,
        ]);
    }

    public function update(Request $request, $deck) 
    {
        $deck->update($request->all());
        return to_route('decks.show', $deck->id);
    }
}
