<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


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
// Oauth for Google
Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();
    $user = User::where('email', $googleUser->getEmail())->first();

    if (!$user) {
        $user = User::create([
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'email_verified_at' => now(),
        ]);
    }
    Auth::login($user);

    return redirect()->to('dashboard');

})->name('google.callback');

Route::get('/auth/redirect', [AuthenticatedSessionController::class, 'redirectToProvider'])->name('login.google');


Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Decks and Cards
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/decks', [DeckController::class, 'index'])->name('decks');
    Route::delete('/decks/{deck}', [DeckController::class, 'destroy'])->name('deck.destroy');
    Route::get('/decks/{deck}', [DeckController::class, 'show'])->name('decks.show');
    Route::post('/dashboard', [DeckController::class, 'store'])->name('decks.store');
    Route::post('/cards/store', [CardController::class, 'store'])->name('cards.store');
});
    // Community Page
    Route::get('community', [PostController::class, 'index'])->name('community');
    Route::get('community/{deck}', [PostController::class, 'show'])->name('community.show');
    Route::post('community', [PostController::class, 'store'])->name('community.store');
    Route::delete('community/{deck}', [PostController::class, 'destroy'])->name('community.destroy');

require __DIR__.'/auth.php';

  // Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    // Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('posts.comments.store');
    // Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    // Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    // Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');