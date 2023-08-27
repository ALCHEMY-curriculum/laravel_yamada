<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccountService
{
  public function getUsersIcon()
  {
    $userIconUrl = User::where('id', Auth::user()->id)->first()->icon_url;
    return $userIconUrl;
  }

  public function saveIcon(int $userId, $icon)
  {
    Storage::putFile('public/images', $icon);
    $user = User::find($userId);
    $user->icon_file_name = $icon->hashName();
    $user->save();
  }
}