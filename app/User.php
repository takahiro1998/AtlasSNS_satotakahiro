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

    // フォロワー→フォロー
    public function followUsers(){
        return $this->belongsToMany('App\User','follows','following_id','followed_id');
    }
    // フォロー→フォロワー
    public function follows(){
        return $this->belongsToMany('App\User','follows','following_id','followed_id');
    }
}
