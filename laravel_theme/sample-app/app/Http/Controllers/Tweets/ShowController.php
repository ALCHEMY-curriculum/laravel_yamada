<?php

namespace App\Http\Controllers\Tweets;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller {

    public function __invoke(Request $request,$id) {
        return view('tweets.show', ['name' => "Alchemy{$id}"]);
    }
}
