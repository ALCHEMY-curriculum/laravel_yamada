<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AccountService;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, AccountService $accountService)
    {
        $iconUrl = $accountService->getUsersIcon();
        return view('account.index')->with('iconUrl', $iconUrl);
    }
}
