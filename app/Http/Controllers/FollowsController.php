<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;

class FollowsController extends Controller
{
    //
    public function followList(){
        // フォローしているユーザー情報を格納
        $following_id=Auth::user()->follows()->pluck('followed_id');
        $followings=User::whereIn('id',$following_id)->get();
        $posts=Post::query()->whereIn('user_id',Auth::user()->follows()->pluck('followed_id'))->get();
        // dd($posts);
        return view('follows.followList',['followings'=>$followings,'posts'=>$posts]);
    }
    public function followerList(){
        $following_id=Auth::user()->followUsers()->pluck('following_id');
        $followings=User::whereIn('id',$following_id)->get();
        $posts=Post::query()->whereIn('user_id',Auth::user()->followUsers()->pluck('following_id'))->get();
        return view('follows.followerList',['followings'=>$followings,'posts'=>$posts]);
    }

    public function store($id){
        Auth::user()->follows()->attach($id);
        return redirect('/search');
    }

    public function unfollow($id){
        Auth::user()->follows()->detach($id);
        return redirect('/search');
    }

}
