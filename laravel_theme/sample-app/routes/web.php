<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tweets', \App\Http\Controllers\Tweets\IndexController::class)
->name('tweets.index');
Route::get('/tweets/{id}',\App\Http\Controllers\Tweets\ShowController::class);
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

