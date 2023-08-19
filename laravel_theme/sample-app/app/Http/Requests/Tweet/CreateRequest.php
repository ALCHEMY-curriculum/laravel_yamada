<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
             // 必須, 最大140文字
             'tweet' => 'required|max:140',
        ];
    }
     // つぶやき本文(name="tweet")を取得
     public function tweet(): string
     {
         return $this->input('tweet');
     }
     public function userId(): int
{
    // Requestクラスでは、user()関数でログイン中のユーザーを取得可能
    return $this->user()->id;
}
}
