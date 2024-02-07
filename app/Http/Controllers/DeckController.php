<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;



class DeckController extends Controller
{
    public function index()
    {
        return Inertia::render('Decks');
        // add logic and model and such later
    }
}
