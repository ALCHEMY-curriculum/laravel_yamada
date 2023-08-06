<?php

namespace App\Http\Controllers\Tweets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tweet;

class DeleteController extends Controller
{
    public function __invoke(Request $request)
    {
        // 削除対象のidを取得
        $id = (int) $request->route('id');

        // つぶやきを検索(見つからなかった場合)
        $tweet = Tweet::where('id', $id)->firstOrFail();

        // つぶやきを削除
        $tweet->delete();

        // リダイレクト
        return redirect()
                ->route('tweets.index')
                ->with('feedback.success', 'つぶやきを削除しました');
    }
}
