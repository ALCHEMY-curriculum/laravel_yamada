<?php

namespace App\Services;

use App\Models\Tweet;

class TweetService
{
  // つぶやき一覧を取得
  public function getTweets()
  {
    return Tweet::orderBy('created_at', 'desc')->get();
  }
  // 自分の投稿かどうか確認
  public function checkOwnTweet(int $userId, int $tweetId): bool
  {
    $tweet = Tweet::where('id', $tweetId)->first();

    // 存在しない場合、false
    if (!$tweet) {
      return false;
    }

    return $tweet->user_id === $userId;
  }
}