<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller {


    public function __invoke() {
      $tweets = User::orderBy('created_at', 'desc')->get();
      return view('account.index');
    }
}
