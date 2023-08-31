<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\Account\IconRequest;
use App\Services\AccountService;

class IconController extends Controller {


    
       public function __invoke(IconRequest $request, AccountService $accountService)
    {
        // アイコン画像の保存とuserのicon_file_nameへ保存
        $accountService->saveIcon(Auth::User()->id, $request->icon());

        // アカウントページへリダイレクト
        return redirect()->route('account.index');
    }

    
}
