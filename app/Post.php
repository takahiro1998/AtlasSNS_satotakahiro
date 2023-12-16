<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'post','user_id'
    ];
    //
    // user:posts=1:多のためuserは単数
    public function user(){
        return $this->belongsTo('App\User');
    }

    // public function destroy(){
    //     $=Item:find();
    // }
}
