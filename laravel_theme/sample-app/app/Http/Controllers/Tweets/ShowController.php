<?php

namespace App\Http\Controllers\Tweets;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

class ShowController extends Controller {


    public function __invoke($id) {
       
        $tweet = Tweet::where('id', $id)->firstOrFail();
       
        return view('tweets.show')
        ->with('tweet', $tweet);

    }
}
