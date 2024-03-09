<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Deck;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['user'])->get();
        return Inertia::render('Community', [
            'posts' => $posts,
            'user' => auth()->user(),
            'decks' => auth()->user()->decks()->with('cards')->get(),
        ]);
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        // $posts = Post::create([
        //     'user_id' => $request->user()->id,
        //     'body' => $request->body,
        // ]);
        // return Inertia::render('Dashboard', [
        //     'post' => $post
        // ]);
    }
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $post = Post::create([
            'user_id' => auth()->user()->id,
            'body' => $request->body,
        ]);

        return to_route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return Inertia::render('Posts/Show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'body' => 'required',
        ]);

        $post->update($validated);

        return to_route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }
}
