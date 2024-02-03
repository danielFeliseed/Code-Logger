<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $posts = Post::with(['comments','user'])->get();
            
            return Inertia::render('Dashboard', [
                'posts' => $posts
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
            'user_id' => $request->user()->id,
            'body' => $request->body,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
