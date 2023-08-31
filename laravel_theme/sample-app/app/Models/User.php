<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $appends = ['icon_url'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function tweets()
{
		// Userは複数のTweetを持つ
    return $this->hasMany(Tweet::class);
}
 /**
     * icon_urlを取得
     * 存在しない場合、ユーザー名の頭文字入りの画像を生成(外部サービス → https://placehold.jp)
     */
    protected function iconUrl(): Attribute
    {
        return new Attribute(
            get: function($value, $attributes) {
                // iconが存在する場合、icon画像urlを返す
                if ($attributes['icon_file_name']) {
                    return asset('storage/images/' . $attributes['icon_file_name']);
                }

                // 名前の1文字目を抜き出し
                $text = mb_substr($attributes['name'], 0 ,1);

                // ダミー画像生成サービスを利用する
                return "https://placehold.jp/150x150.png?text=$text";
            }
        );
    }
}
