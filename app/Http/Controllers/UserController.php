<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user = User::with(['posts'])->find($user->id);
        return Inertia::render('Users/Show', [
            'user' => $user
        ]);
    }
}
