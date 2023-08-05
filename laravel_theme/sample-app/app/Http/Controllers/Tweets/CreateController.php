<?php

namespace App\Http\Controllers\Tweets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\CreateRequest  $request
     */
    public function __invoke(CreateRequest $request)
    {
        // Tweet Modelをインスタンス化
        $tweet = new Tweet();
        
        // contentにformのtweetを挿入
        $tweet->content = $request->tweet();

        // DBに保存
        $tweet->save();

        // つぶやき一覧へリダイレクト
        return redirect()->route('tweets.index');
    }
}
