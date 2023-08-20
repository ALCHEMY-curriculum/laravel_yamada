<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;

class IconController extends Controller {


    public function __invoke() {
       
      
       
        return view('account.icon');
      

    }
}
