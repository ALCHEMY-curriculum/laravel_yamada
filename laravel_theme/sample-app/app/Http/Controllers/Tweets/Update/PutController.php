<?php

namespace App\Http\Controllers\Tweets\Update;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\UpdateRequest;
use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PutController extends Controller
{
    public function __invoke(UpdateRequest $request, TweetService $tweetService)
    {
        $tweetId = (int) $request->route('id');
        if (!$tweetService->checkOwnTweet($request->user()->id, $tweetId)) {
            throw new AccessDeniedHttpException();
        }

        $tweet = Tweet::where('id', $request->id())->firstOrFail();
        $tweet->content = $request->tweet();
        $tweet->save();
        return redirect()
                ->route('tweets.update.index', ['id' => $tweet->id])
                ->with('feedback.success', 'つぶやきを編集しました');
    }
}
