<?php

namespace App\Http\Controllers\Tweets\Update;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $id = (int) $request->route('id');
        $tweet = Tweet::where('id', $id)->firstOrFail();
       
        return view('tweets.update.index')
            ->with('tweet', $tweet);
    }
}
