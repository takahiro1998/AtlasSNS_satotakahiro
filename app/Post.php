<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'post'
    ];
    //
    public function posts(){
        return $this->hasMany('App\post');
    }

    // public function destroy(){
    //     $=Item:find();
    // }
}
