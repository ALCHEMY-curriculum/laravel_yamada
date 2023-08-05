<?php

namespace App\Http\Controllers\Tweets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $tweets = Tweet::orderBy('created_at', 'desc')->get();
        return view('tweets.index')
								->with('tweets', $tweets);
    }
}
