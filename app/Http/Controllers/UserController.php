<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user = User::with(['posts', 'posts.comments', 'posts.comments.user'])->find($user->id);
        return Inertia::render('Users/Show', [
            'user' => $user,
            'posts' => $user->posts,
            'comments' => $user->comments,
            
        ]);
    }
}
