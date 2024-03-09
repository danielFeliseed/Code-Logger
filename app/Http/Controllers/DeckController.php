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
        $decks = Deck::with('cards', 'user')->get();
        return Inertia::render('Decks', [
            'decks' => auth()->user()->decks,
            'user' => auth()->user(),
        ]);
    }

    public function show(Deck $deck)
    {
        
        $deck = Deck::with('cards')->find($deck->id);
        return Inertia::render('Decks/Show', [
            'cards' => $deck->cards,
            'deck' => $deck,
        ]);
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
        \Log::info($request->all());

        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            // if a card is being created at the same time as a deck
            'front' => 'nullable',
            'back' => 'nullable',
            
        ]);
        $deck = Deck::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'description' => $request->description ?? null,
            'color' => $request->color ?? null,
            'category_id' => $request->category_id,
        ]);

        if ($request->has(['front', 'back'])) {
            try {
                $card = Card::create([
                    'front' => $request->front,
                    'back' => $request->back,
                    'deck_id' => $deck->id,
                    'user_id' => $request->user()->id,
                ]);
            } catch (\Exception $e) {
                \Log::error('Error creating card: ' . $e->getMessage());
            }
        }

        return to_route('decks.show', $deck->id);
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

    public function destroy(Deck $deck)
    {
        $deck->delete();
        return to_route('decks');
    }
}
