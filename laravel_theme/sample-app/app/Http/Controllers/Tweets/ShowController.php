<?php

namespace App\Http\Controllers\Tweets;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller {

    public function __invoke($id) {
        return view('tweets.show', ['name' => "Alchemy${id}"]);
    }
}
