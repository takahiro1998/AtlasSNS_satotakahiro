<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }


    // belongsToMany('関係するモデル','中間テーブル名','中間テーブル内で対応するカラム','関係モデルで対応するカラム')

    // フォロワー→フォロー
    public function followUsers(){
        return $this->belongsToMany('App\User','follows','followed_id','following_id');
    }
    // フォロー→フォロワー
    public function follows(){
        return $this->belongsToMany('App\User','follows','following_id','followed_id');
    }

    public function isFollowing(Int $user_id){
        return (bool) $this->follows()->where("followed_id",$user_id)->first(['follows.id']);
    }

    public function isFollowed(Int $user_id){
        return (bool) $this->follows()->where("following_id",$user_id)->first(['follows.id']);
    }
}
