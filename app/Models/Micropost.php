<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    use HasFactory;
    
    protected $fillable = ['content'];  // $fillable:複数代入の脆弱性対策
    // protected:本クラスを継承している先のクラスでのみ
    // 呼び出すことのできるメソッドやプロパティを設定する際に使う

    /**
     * この投稿を所有するユーザー。（ Userモデルとの関係を定義）
     */
    public function user()  // Micropostに対してuserは必ず1人だから単数形
    {
        return $this->belongsTo(User::class);  // belongs to:属する
    }
    
    /**
     * このmicropostsをお気に入り中のユーザー。（Userモデルとの関係を定義）
     */
    public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'favorites', 'micropost_id', 'user_id')->withTimestamps();
    }
}
