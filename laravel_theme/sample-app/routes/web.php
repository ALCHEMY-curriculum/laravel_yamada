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