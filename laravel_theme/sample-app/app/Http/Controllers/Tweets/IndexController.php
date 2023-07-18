<?php

namespace App\Http\Controllers\Tweets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function __invoke(Request $request)
    {
        return view('tweets.index', ['name' => 'Alchemy']);
    }
}
