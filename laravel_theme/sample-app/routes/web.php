<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('auth')->group(function() {
Route::get('/tweets', \App\Http\Controllers\Tweets\IndexController::class)
->name('tweets.index');
Route::get('/tweets/{id}', \App\Http\Controllers\Tweets\ShowController::class)
    ->name('tweets.show');
Route::post('/tweets/create', \App\Http\Controllers\Tweets\CreateController::class)
->name('tweets.create');
Route::get('/tweets/update/{id}', \App\Http\Controllers\Tweets\Update\IndexController::class)
    ->name('tweets.update.index')
    ->where('id', '[0-9]+');
Route::put('/tweets/update/{id}', \App\Http\Controllers\Tweets\Update\PutController::class)
    ->name('tweets.update.put')
    ->where('id', '[0-9]+');
Route::delete('/tweets/{id}', \App\Http\Controllers\Tweets\DeleteController::class)
    ->name('tweets.delete')
    ->where('id', '[0-9]+');

Route::get('/account', \App\Http\Controllers\Account\IndexController::class)
    ->name('account.index');
Route::post('/account/icon', \App\Http\Controllers\Account\IconController::class)
    ->name('account.icon');

});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
