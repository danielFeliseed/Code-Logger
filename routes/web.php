<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\User;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\CardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    // Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('posts.comments.store');
    // Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    // Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    // Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    

    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/decks', [DeckController::class, 'index'])->name('decks');
    Route::get('/decks/{deck}', [DeckController::class, 'show'])->name('decks.show');
    Route::post('/dashboard', [DeckController::class, 'store'])->name('decks.store');
    Route::post('/cards/store', [CardController::class, 'store'])->name('cards.store');
});

require __DIR__.'/auth.php';



// $fruitsArray = ['apple', 'orange', 'banana', 'apple']
// array_push($fruitsArray, 'blueberry')
// array_unique($fruitsArray)
