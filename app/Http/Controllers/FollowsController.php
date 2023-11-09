<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

    // public function index(){
    //     $posts=Post::query()->whereIn('user_id',Auth::user()->follows()->pluck('followed_id'))->latest()->get();
    //     return view('posts.index');
    // }
}
