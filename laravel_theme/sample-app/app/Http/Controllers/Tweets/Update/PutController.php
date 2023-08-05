<?php

namespace App\Http\Controllers\Tweets\Update;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\UpdateRequest;
use App\Models\Tweet;
use Illuminate\Http\Request;

class PutController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $tweet = Tweet::where('id', $request->id())->firstOrFail();
        $tweet->content = $request->tweet();
        $tweet->save();
        return redirect()
                ->route('tweets.update.index', ['id' => $tweet->id])
                ->with('feedback.success', 'つぶやきを編集しました');
    }
}
