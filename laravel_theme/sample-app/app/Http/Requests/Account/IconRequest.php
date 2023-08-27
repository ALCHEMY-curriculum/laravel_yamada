<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class IconRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'icon' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ];
    }

    // 画像を取得
    public function icon()
    {
        return $this->file('icon');
    }
}
