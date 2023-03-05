<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;

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

Route::get('/', [TweetController::class, 'index'])->name('index');

Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');


Route::get('/tweets/create', [TweetController::class, 'create'])->name('tweets.create');
Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
Route::get('/tweets/{id}', [TweetController::class, 'show'])->name('tweets.show');

Route::post('/tweets/{id}/like', [TweetController::class, 'like'])->name('tweets.like');

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
